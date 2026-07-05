<?php

namespace App\Livewire\Admin;

use App\Services\AnalyticsService;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(AnalyticsService $analytics)
    {
        return view('livewire.admin.dashboard', ['overview' => $analytics->adminOverview()]);
    }
}
