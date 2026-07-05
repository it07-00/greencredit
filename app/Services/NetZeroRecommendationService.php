<?php

namespace App\Services;

use App\Models\NetZeroGoal;
use App\Models\NetZeroProgress;
use App\Models\PersonalRecommendation;
use App\Models\User;

class NetZeroRecommendationService
{
    public function generateMonthlyGoal(User $user): NetZeroGoal
    {
        return NetZeroGoal::firstOrCreate(
            ['user_id' => $user->id, 'month' => now()->month, 'year' => now()->year],
            ['plastic_target_grams' => 700, 'co2_target_kg' => 8, 'points_target' => 300, 'action_target' => 20, 'status' => 'active']
        );
    }

    public function updateProgressFromTransaction($transaction): NetZeroProgress
    {
        $goal = $this->generateMonthlyGoal($transaction->user);
        $progress = NetZeroProgress::firstOrCreate(
            ['user_id' => $transaction->user_id, 'net_zero_goal_id' => $goal->id, 'progress_date' => today()],
        );
        $progress->increment('points_earned', $transaction->points);
        $progress->increment('actions_count');
        $progress->plastic_saved_grams += $transaction->plastic_saved_grams;
        $progress->co2_saved_kg += $transaction->co2_saved_kg;
        $progress->save();

        return $progress;
    }

    public function generateRecommendations(User $user): void
    {
        $items = [
            ['Mang binh ca nhan them 3 lan tuan nay', 'Giam rac thai nhua va nhan them diem xanh.', 'plastic', 60],
            ['Di bo hoac dap xe cho quang duong duoi 2km', 'Tang diem CO2 va giu chuoi ngay xanh.', 'transport', 40],
            ['Thu hanh dong tai che hoac dung tui vai', 'Da dang hoa hanh vi de cai thien Green Score.', 'recycling', 45],
        ];

        foreach ($items as [$title, $description, $category, $points]) {
            PersonalRecommendation::firstOrCreate(
                ['user_id' => $user->id, 'title' => $title],
                ['description' => $description, 'category' => $category, 'estimated_points' => $points, 'status' => 'new']
            );
        }
    }

    public function applyRecommendation(PersonalRecommendation $recommendation): void
    {
        $recommendation->update(['status' => 'applied']);
    }

    public function completeRecommendation(PersonalRecommendation $recommendation): void
    {
        $recommendation->update(['status' => 'completed']);
    }
}
