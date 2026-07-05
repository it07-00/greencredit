<?php

namespace App\Services;

use App\Models\FraudAlert;
use App\Models\GreenInvoice;
use App\Models\GreenTransaction;
use App\Models\Partner;
use App\Models\Store;
use App\Models\User;
use App\Models\Voucher;
use App\Models\VoucherRedemption;

class AnalyticsService
{
    public function adminOverview(): array
    {
        return [
            'users' => User::count(),
            'stores' => Store::count(),
            'partners' => Partner::count(),
            'invoices' => GreenInvoice::count(),
            'transactions' => GreenTransaction::count(),
            'points' => GreenTransaction::sum('points'),
            'redemptions' => VoucherRedemption::count(),
            'fraud' => FraudAlert::where('status', 'open')->count(),
        ];
    }

    public function userDashboard(User $user): array
    {
        return [
            'wallet' => $user->wallet,
            'score' => $user->greenScoreHistories()->latest('calculated_at')->first(),
            'transactions' => $user->greenTransactions()->latest()->limit(8)->get(),
            'vouchers' => Voucher::where('status', 'active')->limit(4)->get(),
            'plastic' => $user->greenTransactions()->sum('plastic_saved_grams'),
            'co2' => $user->greenTransactions()->sum('co2_saved_kg'),
        ];
    }
}
