<?php

namespace App\Filament\Widgets;

use App\Models\GreenTransaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class TransactionChart extends ChartWidget
{
    protected ?string $heading = 'Giao dịch xanh — 6 tháng gần nhất';

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        $months = collect(range(5, 0))->map(fn (int $offset) => now()->subMonths($offset)->startOfMonth());
        $transactions = GreenTransaction::where('created_at', '>=', $months->first())
            ->get()
            ->groupBy(fn (GreenTransaction $transaction) => $transaction->created_at->format('Y-m'));

        return [
            'datasets' => [
                [
                    'label' => 'Số giao dịch',
                    'data' => $months->map(fn (Carbon $month) => $transactions->get($month->format('Y-m'), collect())->count())->all(),
                    'borderColor' => '#15803D',
                    'backgroundColor' => 'rgba(21, 128, 61, 0.10)',
                    'fill' => true,
                    'tension' => 0.4,
                    'pointBackgroundColor' => '#15803D',
                    'pointRadius' => 4,
                ],
                [
                    'label' => 'Green Points',
                    'data' => $months->map(fn (Carbon $month) => $transactions->get($month->format('Y-m'), collect())->sum('points'))->all(),
                    'borderColor' => '#F59E0B',
                    'backgroundColor' => 'rgba(245, 158, 11, 0.08)',
                    'fill' => false,
                    'tension' => 0.4,
                    'pointBackgroundColor' => '#F59E0B',
                    'pointRadius' => 4,
                ],
                [
                    'label' => 'Nhựa giảm (g)',
                    'data' => $months->map(fn (Carbon $month) => (int) $transactions->get($month->format('Y-m'), collect())->sum('plastic_saved_grams'))->all(),
                    'borderColor' => '#0EA5E9',
                    'backgroundColor' => 'rgba(14, 165, 233, 0.08)',
                    'fill' => false,
                    'tension' => 0.4,
                    'pointBackgroundColor' => '#0EA5E9',
                    'pointRadius' => 4,
                ],
            ],
            'labels' => $months->map(fn (Carbon $month) => $month->format('m/Y'))->all(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
