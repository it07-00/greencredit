<?php

namespace App\Livewire\Public;

use App\Models\GreenLevel;
use App\Models\User;
use App\Services\GreenScoreService;
use Livewire\Component;

class GreenScoreInfo extends Component
{
    public function render(GreenScoreService $service)
    {
        $user = auth()->user() ?: User::where('email', 'user@greencredit.test')->first() ?: User::first();
        $levels = GreenLevel::orderBy('sort_order')->get();

        if ($user) {
            $history = $user->greenScoreHistories()->latest('calculated_at')->first() ?? $service->saveScoreHistory($user, 'public_preview');
        } else {
            $history = (object) [
                'score' => 820,
                'level_code' => 'tree',
                'behavior_score' => 320,
                'consistency_score' => 160,
                'diversity_score' => 120,
                'verification_score' => 140,
                'community_score' => 80,
                'fraud_penalty' => 0,
            ];
        }

        return view('livewire.user.green-score', compact('history', 'levels'));
    }
}
