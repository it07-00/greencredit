<?php

namespace App\Services;

use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherRedemption;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;

class VoucherService
{
    public function __construct(private GreenPointService $points, private GreenScoreService $scores) {}

    public function canRedeem(User $user, Voucher $voucher): bool
    {
        return $voucher->status === 'active'
            && (! $voucher->expired_at || $voucher->expired_at->isFuture())
            && ($voucher->quantity === null || $voucher->used_quantity < $voucher->quantity)
            && $this->points->getBalance($user) >= $voucher->required_points
            && $this->scores->getCurrentScore($user) >= $voucher->min_green_score;
    }

    public function redeemVoucher(User $user, Voucher $voucher): VoucherRedemption
    {
        return DB::transaction(function () use ($user, $voucher) {
            $voucher = Voucher::whereKey($voucher->id)->lockForUpdate()->firstOrFail();

            if (! $this->canRedeem($user, $voucher)) {
                throw new RuntimeException('Voucher da het han, het luot doi hoac so du diem khong du.');
            }

            $redemption = VoucherRedemption::create([
                'user_id' => $user->id,
                'voucher_id' => $voucher->id,
                'redemption_code' => $this->generateRedemptionCode(),
                'points_used' => $voucher->required_points,
                'status' => 'issued',
                'expired_at' => now()->addDays(30),
            ]);

            $this->points->redeemPoints($user, $voucher->required_points, 'Doi voucher '.$voucher->title, $redemption);
            $voucher->increment('used_quantity');

            return $redemption;
        });
    }

    public function generateRedemptionCode(): string
    {
        return 'VC-'.Str::upper(Str::random(10));
    }

    public function markAsUsed(VoucherRedemption $redemption): void
    {
        $redemption->update(['status' => 'used', 'used_at' => now()]);
    }

    public function expireOldRedemptions(): int
    {
        return VoucherRedemption::where('status', 'issued')
            ->whereNotNull('expired_at')
            ->where('expired_at', '<', now())
            ->update(['status' => 'expired']);
    }
}
