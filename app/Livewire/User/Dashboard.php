<?php

namespace App\Livewire\User;

use App\Models\GreenTransaction;
use App\Models\Voucher;
use App\Services\AnalyticsService;
use App\Services\GreenPointService;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(AnalyticsService $analytics, GreenPointService $points)
    {
        $user = auth()->user();
        $points->ensureWallet($user);

        $base = $analytics->userDashboard($user);

        // Last 6 months points sparkline data
        $months = collect(range(5, 0))->map(fn (int $off) => now()->subMonths($off)->startOfMonth());
        $txByMonth = GreenTransaction::where('user_id', $user->id)
            ->where('created_at', '>=', $months->first())
            ->get()
            ->groupBy(fn ($t) => $t->created_at->format('Y-m'));

        $chartLabels = $months->map(fn (Carbon $m) => $m->format('m/Y'))->all();
        $chartData   = $months->map(fn (Carbon $m) => $txByMonth->get($m->format('Y-m'), collect())->sum('points'))->all();

        // Level info from Green Score
        $scoreRecord = $base['score'];
        $levelInfo = [
            'seed'    => ['label' => 'Mầm Xanh',    'color' => '#6b7280', 'next' => 200],
            'sprout'  => ['label' => 'Cây Non',      'color' => '#84cc16', 'next' => 500],
            'leaf'    => ['label' => 'Lá Xanh',      'color' => '#22c55e', 'next' => 1000],
            'tree'    => ['label' => 'Cây Trưởng',   'color' => '#16a34a', 'next' => 2000],
            'forest'  => ['label' => 'Khu Rừng',     'color' => '#15803d', 'next' => 5000],
            'planet'  => ['label' => 'Hành Tinh Xanh','color' => '#065f46','next' => null],
        ];
        $levelCode = $scoreRecord?->level_code ?? 'seed';
        $level = $levelInfo[$levelCode] ?? $levelInfo['seed'];

        return view('livewire.user.dashboard', array_merge($base, [
            'chartLabels' => json_encode($chartLabels),
            'chartData'   => json_encode($chartData),
            'level'       => $level,
            'levelCode'   => $levelCode,
            'score'       => $scoreRecord?->score ?? 0,
            'streakDays'  => 7, // placeholder
        ]));
    }
}
