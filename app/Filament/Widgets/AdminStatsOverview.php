<?php

namespace App\Filament\Widgets;

use App\Models\FraudAlert;
use App\Models\GreenInvoice;
use App\Models\GreenTransaction;
use App\Models\Partner;
use App\Models\Store;
use App\Models\User;
use App\Models\VoucherRedemption;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $thisMonth  = Carbon::now()->startOfMonth();
        $lastMonth  = Carbon::now()->subMonth()->startOfMonth();
        $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();

        $newUsersThisMonth = User::where('created_at', '>=', $thisMonth)->count();
        $newUsersLastMonth = User::whereBetween('created_at', [$lastMonth, $lastMonthEnd])->count();
        $userTrend = $newUsersLastMonth > 0
            ? round((($newUsersThisMonth - $newUsersLastMonth) / $newUsersLastMonth) * 100, 1)
            : 0;

        $invoicesThisMonth = GreenInvoice::where('created_at', '>=', $thisMonth)->count();
        $openFraud = FraudAlert::whereIn('status', ['open', 'reviewing'])->count();
        $highRiskFraud = FraudAlert::whereIn('status', ['open', 'reviewing'])->where('risk_score', '>=', 70)->count();

        return [
            Stat::make('Người dùng', number_format(User::count()))
                ->description($userTrend >= 0 ? "+{$userTrend}% so với tháng trước" : "{$userTrend}% so với tháng trước")
                ->descriptionIcon($userTrend >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->icon('heroicon-o-users')
                ->color($userTrend >= 0 ? 'success' : 'warning'),

            Stat::make('Cửa hàng đối tác', number_format(Store::count()))
                ->description('Mạng lưới bán lẻ xanh')
                ->descriptionIcon('heroicon-m-building-storefront')
                ->icon('heroicon-o-building-storefront')
                ->color('success'),

            Stat::make('Hóa đơn xanh', number_format(GreenInvoice::count()))
                ->description("+{$invoicesThisMonth} tháng này")
                ->descriptionIcon('heroicon-m-document-text')
                ->icon('heroicon-o-qr-code')
                ->color('info'),

            Stat::make('Green Points', number_format(GreenTransaction::where('points', '>', 0)->sum('points')))
                ->description('Tổng điểm đã phát hành')
                ->descriptionIcon('heroicon-m-star')
                ->icon('heroicon-o-sparkles')
                ->color('warning'),

            Stat::make('Voucher đổi', number_format(VoucherRedemption::count()))
                ->description('Lượt đổi thưởng')
                ->descriptionIcon('heroicon-m-ticket')
                ->icon('heroicon-o-gift')
                ->color('info'),

            Stat::make('⚠ Cảnh báo rủi ro cao', $highRiskFraud)
                ->description("{$openFraud} cảnh báo đang mở")
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->icon('heroicon-o-shield-exclamation')
                ->color($openFraud > 0 ? 'danger' : 'success'),
        ];
    }
}
