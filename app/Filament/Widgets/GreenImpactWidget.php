<?php

namespace App\Filament\Widgets;

use App\Models\GreenTransaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GreenImpactWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        $totalPlastic = GreenTransaction::where('status', 'approved')->sum('plastic_saved_grams');
        $totalCo2     = GreenTransaction::where('status', 'approved')->sum('co2_saved_kg');
        $totalTx      = GreenTransaction::where('type', 'invoice_scan')->where('status', 'approved')->count();
        $totalPoints  = GreenTransaction::where('points', '>', 0)->sum('points');

        return [
            Stat::make('🧪 Nhựa đã giảm thiểu', number_format($totalPlastic / 1000, 2) . ' kg')
                ->description(number_format($totalPlastic) . 'g tổng cộng')
                ->descriptionIcon('heroicon-m-beaker')
                ->color('success'),

            Stat::make('☁ CO₂ đã giảm', number_format($totalCo2, 2) . ' kg')
                ->description('Tương đương ' . number_format($totalCo2 / 21, 1) . ' cây xanh/năm')
                ->descriptionIcon('heroicon-m-cloud')
                ->color('info'),

            Stat::make('📱 Hành động xanh', number_format($totalTx))
                ->description('Lần quét QR thành công')
                ->descriptionIcon('heroicon-m-qr-code')
                ->color('success'),

            Stat::make('⭐ Green Points phát hành', number_format($totalPoints))
                ->description('Điểm tích lũy toàn hệ thống')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
        ];
    }
}
