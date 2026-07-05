<?php

namespace App\Filament\Partner\Pages;

use App\Models\GreenInvoice;
use App\Models\Store;
use App\Models\StoreStaff;
use App\Models\Voucher;
use App\Models\VoucherRedemption;
use Filament\Pages\Dashboard as BaseDashboard;

class PartnerDashboard extends BaseDashboard
{
    protected static string $routePath = '/';

    protected static ?string $navigationLabel = 'Tổng quan';

    protected static ?string $title = 'Tổng quan';

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-home';
    }

    public function getWidgets(): array
    {
        return [
            \App\Filament\Partner\Widgets\PartnerStatsOverview::class,
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [];
    }

    public function getHeaderWidgetsColumns(): int|array
    {
        return 4;
    }

    /**
     * Lấy store hiện tại của user (store_owner hoặc store_staff).
     */
    protected function currentStore(): ?Store
    {
        $user = auth()->user();

        if ($user->role === 'store_owner') {
            return Store::where('owner_id', $user->id)->first();
        }

        if ($user->role === 'store_staff') {
            return StoreStaff::where('user_id', $user->id)->first()?->store;
        }

        return null;
    }
}
