<?php

namespace App\Livewire\User;

use App\Models\GreenLevel;
use App\Services\GreenScoreService;
use Livewire\Component;

class GreenScore extends Component
{
    public function render(GreenScoreService $service)
    {
        $user = auth()->user();
        $history = $user->greenScoreHistories()->latest('calculated_at')->first() ?? $service->saveScoreHistory($user, 'dashboard');
        $levels = GreenLevel::orderBy('sort_order')->get();

        return view('livewire.user.green-score', compact('history', 'levels'));
    }
}
