<?php

namespace App\Livewire\User;

use App\Models\NetZeroProgress;
use App\Models\PersonalRecommendation;
use App\Services\NetZeroRecommendationService;
use Livewire\Component;

class NetZeroPlanner extends Component
{
    public function apply(int $id, NetZeroRecommendationService $service): void
    {
        $service->applyRecommendation(PersonalRecommendation::where('user_id', auth()->id())->findOrFail($id));
    }

    public function render(NetZeroRecommendationService $service)
    {
        $user = auth()->user();
        $goal = $service->generateMonthlyGoal($user);
        $service->generateRecommendations($user);
        $progress = $user->hasMany(NetZeroProgress::class)->where('net_zero_goal_id', $goal->id)->get();
        $recommendations = PersonalRecommendation::where('user_id', $user->id)->latest()->get();

        return view('livewire.user.net-zero-planner', compact('goal', 'progress', 'recommendations'));
    }
}
