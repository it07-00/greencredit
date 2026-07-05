<?php

namespace App\Filament\Widgets;

use App\Models\FraudAlert;
use App\Models\GreenInvoice;
use App\Models\GreenTransaction;
use App\Models\Partner;
use App\Models\Store;
use App\Models\User;
use App\Models\VoucherRedemption;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Người dùng', number_format(User::count()))->description('Tài khoản trên hệ thống')->color('success'),
            Stat::make('Cửa hàng', number_format(Store::count()))->description('Đối tác bán lẻ')->color('success'),
            Stat::make('Đối tác', number_format(Partner::count()))->description('Voucher và tài chính')->color('info'),
            Stat::make('Hóa đơn xanh', number_format(GreenInvoice::count()))->description('QR đã phát hành')->color('success'),
            Stat::make('Green Points', number_format(GreenTransaction::where('points', '>', 0)->sum('points')))->description('Tổng điểm phát hành')->color('warning'),
            Stat::make('Voucher đã đổi', number_format(VoucherRedemption::count()))->description('Lượt đổi thưởng')->color('info'),
            Stat::make('Cảnh báo mở', number_format(FraudAlert::whereIn('status', ['open', 'reviewing'])->count()))->description('Cần xử lý')->color('danger'),
        ];
    }
}
