<?php

namespace App\Services;

use App\Models\GreenPoint;
use App\Models\GreenWallet;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class GreenPointService
{
    public function ensureWallet(User $user): GreenWallet
    {
        return GreenWallet::firstOrCreate(['user_id' => $user->id]);
    }

    public function getBalance(User $user): int
    {
        return (int) $this->ensureWallet($user)->current_balance;
    }

    public function updateWalletBalance(User $user): GreenWallet
    {
        return DB::transaction(function () use ($user) {
            $wallet = GreenWallet::where('user_id', $user->id)->lockForUpdate()->first()
                ?? GreenWallet::create(['user_id' => $user->id]);
            $ledger = GreenPoint::where('user_id', $user->id);
            $wallet->update([
                'total_earned' => (clone $ledger)->whereIn('type', ['earn', 'refund', 'adjustment'])->where('points', '>', 0)->sum('points'),
                'total_redeemed' => abs((int) (clone $ledger)->where('type', 'redeem')->sum('points')),
                'total_penalty' => abs((int) (clone $ledger)->where('type', 'penalty')->sum('points')),
                'current_balance' => max(0, (int) $ledger->sum('points')),
            ]);

            return $wallet->refresh();
        });
    }

    public function earnPoints(User $user, int $points, string $description, ?Model $reference = null): GreenPoint
    {
        return $this->writeLedger($user, 'earn', abs($points), $description, $reference);
    }

    public function redeemPoints(User $user, int $points, string $description, ?Model $reference = null): GreenPoint
    {
        if ($this->getBalance($user) < $points) {
            throw new RuntimeException('Số dư Green Points không đủ.');
        }

        return $this->writeLedger($user, 'redeem', -abs($points), $description, $reference);
    }

    public function refundPoints(User $user, int $points, string $description, ?Model $reference = null): GreenPoint
    {
        return $this->writeLedger($user, 'refund', abs($points), $description, $reference);
    }

    public function penaltyPoints(User $user, int $points, string $description, ?Model $reference = null): GreenPoint
    {
        return $this->writeLedger($user, 'penalty', -abs($points), $description, $reference);
    }

    private function writeLedger(User $user, string $type, int $points, string $description, ?Model $reference = null): GreenPoint
    {
        return DB::transaction(function () use ($user, $type, $points, $description, $reference) {
            $wallet = GreenWallet::where('user_id', $user->id)->lockForUpdate()->first()
                ?? GreenWallet::create(['user_id' => $user->id]);

            $before = (int) $wallet->current_balance;
            $after = $before + $points;

            if ($after < 0) {
                throw new RuntimeException('Số dư Green Points không đủ.');
            }

            if ($points > 0) {
                $wallet->total_earned += $points;
            } elseif ($type === 'redeem') {
                $wallet->total_redeemed += abs($points);
            } elseif ($type === 'penalty') {
                $wallet->total_penalty += abs($points);
            }

            $wallet->current_balance = $after;
            $wallet->save();

            return GreenPoint::create([
                'user_id' => $user->id,
                'type' => $type,
                'points' => $points,
                'balance_before' => $before,
                'balance_after' => $after,
                'description' => $description,
                'reference_type' => $reference ? $reference::class : null,
                'reference_id' => $reference?->getKey(),
            ]);
        });
    }
}
