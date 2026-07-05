<?php

namespace App\Filament\Partner\Widgets;

use App\Models\Campaign;
use App\Models\FinancialOffer;
use App\Models\GreenInvoice;
use App\Models\Partner;
use App\Models\Store;
use App\Models\StoreStaff;
use App\Models\Voucher;
use App\Models\VoucherRedemption;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PartnerStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = auth()->user();
        if (!$user) {
            return [];
        }

        // Store role stats
        if (in_array($user->role, ['store_owner', 'store_staff'])) {
            $store = null;
            if ($user->role === 'store_owner') {
                $store = Store::where('owner_id', $user->id)->first();
            } else {
                $store = StoreStaff::where('user_id', $user->id)->first()?->store;
            }

            if (!$store) {
                return [
                    Stat::make('Cửa hàng', 'Không tìm thấy thông tin')->color('danger')
                ];
            }

            $invoices = GreenInvoice::where('store_id', $store->id);
            $totalInvoices = $invoices->count();
            $totalPoints = $invoices->sum('base_points');
            $totalPlastic = $invoices->sum('plastic_saved_grams');
            $totalCo2 = $invoices->sum('co2_saved_kg');
            $totalAmount = $invoices->sum('amount');

            return [
                Stat::make('Hóa đơn xanh', number_format($totalInvoices))
                    ->description('Tổng số hóa đơn đã phát hành')
                    ->color('success'),
                Stat::make('Green Points', number_format($totalPoints))
                    ->description('Điểm xanh đã phát hành cho khách')
                    ->color('warning'),
                Stat::make('Nhựa giảm thiểu', number_format($totalPlastic) . 'g')
                    ->description('Lượng nhựa tránh xả thải')
                    ->color('success'),
                Stat::make('CO2 giảm thiểu', number_format($totalCo2, 2) . 'kg')
                    ->description('Lượng khí CO2 giảm thiểu')
                    ->color('success'),
                Stat::make('Doanh thu tiêu dùng xanh', number_format($totalAmount) . 'đ')
                    ->description('Doanh số tích lũy')
                    ->color('info'),
            ];
        }

        // Partner role stats
        if ($user->role === 'partner') {
            $partner = Partner::where('user_id', $user->id)->first();
            if (!$partner) {
                return [
                    Stat::make('Đối tác', 'Không tìm thấy thông tin')->color('danger')
                ];
            }

            $voucherIds = Voucher::where('partner_id', $partner->id)->pluck('id');
            $totalVouchers = Voucher::where('partner_id', $partner->id)->count();
            $totalRedemptions = VoucherRedemption::whereIn('voucher_id', $voucherIds)->count();
            $pointsSpent = VoucherRedemption::whereIn('voucher_id', $voucherIds)->sum('points_used');
            $activeCampaigns = Campaign::where('partner_id', $partner->id)->where('status', 'active')->count();
            $totalOffers = FinancialOffer::where('partner_id', $partner->id)->count();

            return [
                Stat::make('Voucher đã phát hành', number_format($totalVouchers))
                    ->description('Danh mục ưu đãi')
                    ->color('info'),
                Stat::make('Lượt đổi voucher', number_format($totalRedemptions))
                    ->description('Khách hàng đã quy đổi thành công')
                    ->color('success'),
                Stat::make('Điểm tiêu dùng nhận lại', number_format($pointsSpent))
                    ->description('Tổng Green Points đã thu hồi')
                    ->color('warning'),
                Stat::make('Chiến dịch kích hoạt', number_format($activeCampaigns))
                    ->description('Đang chạy thực tế')
                    ->color('success'),
                Stat::make('Simulate gói tài chính', number_format($totalOffers))
                    ->description('Gói ưu đãi theo Green Score')
                    ->color('primary'),
            ];
        }

        return [];
    }
}
