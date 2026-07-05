<?php

namespace App\Filament\Widgets;

use App\Models\GreenTransaction;
use Filament\Widgets\Widget;

class GreenImpactWidget extends Widget
{
    protected string $view = 'filament.widgets.green-impact-widget';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function getStats(): array
    {
        $totalPlastic = GreenTransaction::where('status', 'approved')->sum('plastic_saved_grams');
        $totalCo2     = GreenTransaction::where('status', 'approved')->sum('co2_saved_kg');
        $totalTx      = GreenTransaction::where('type', 'invoice_scan')->where('status', 'approved')->count();
        $totalPoints  = GreenTransaction::where('points', '>', 0)->sum('points');

        return [
            [
                'label' => 'Nhựa đã giảm thiểu',
                'value' => number_format($totalPlastic / 1000, 2) . ' kg',
                'sub'   => number_format($totalPlastic) . 'g tổng cộng',
                'bg'    => '#d1fae5',
                'stroke'=> '#059669',
                'type'  => 'beaker',
            ],
            [
                'label' => 'CO₂ đã giảm',
                'value' => number_format($totalCo2, 2) . ' kg',
                'sub'   => 'Tương đương ' . number_format($totalCo2 / 21, 1) . ' cây xanh/năm',
                'bg'    => '#e0f2fe',
                'stroke'=> '#0284c7',
                'type'  => 'cloud',
            ],
            [
                'label' => 'Hành động xanh',
                'value' => number_format($totalTx),
                'sub'   => 'Lần quét QR thành công',
                'bg'    => '#ecfccb',
                'stroke'=> '#65a30d',
                'type'  => 'qr',
            ],
            [
                'label' => 'Green Points phát hành',
                'value' => number_format($totalPoints),
                'sub'   => 'Điểm tích lũy toàn hệ thống',
                'bg'    => '#fef3c7',
                'stroke'=> '#d97706',
                'type'  => 'star',
            ],
        ];
    }

}
