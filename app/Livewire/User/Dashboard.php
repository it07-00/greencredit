<?php

namespace App\Livewire\User;

use App\Services\AnalyticsService;
use App\Services\GreenPointService;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(AnalyticsService $analytics, GreenPointService $points)
    {
        $user = auth()->user();
        $points->ensureWallet($user);

        return view('livewire.user.dashboard', ['data' => $analytics->userDashboard($user)]);
    }
}
