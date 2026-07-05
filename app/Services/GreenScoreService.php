<?php

namespace App\Services;

use App\Models\FraudAlert;
use App\Models\GreenLevel;
use App\Models\GreenScoreHistory;
use App\Models\GreenTransaction;
use App\Models\User;

class GreenScoreService
{
    public function calculateScore(User $user): GreenScoreHistory
    {
        return $this->saveScoreHistory($user, 'system');
    }

    public function saveScoreHistory(User $user, string $reason = 'system'): GreenScoreHistory
    {
        $behavior = $this->calculateBehaviorScore($user);
        $consistency = $this->calculateConsistencyScore($user);
        $diversity = $this->calculateDiversityScore($user);
        $verification = $this->calculateVerificationScore($user);
        $community = $this->calculateCommunityScore($user);
        $fraud = $this->calculateFraudPenalty($user);
        $score = (int) max(0, min(1000, round($behavior + $consistency + $diversity + $verification + $community - $fraud)));
        $level = $this->getLevelByScore($score);

        return GreenScoreHistory::create([
            'user_id' => $user->id,
            'score' => $score,
            'level_code' => $level?->code,
            'behavior_score' => $behavior,
            'consistency_score' => $consistency,
            'diversity_score' => $diversity,
            'verification_score' => $verification,
            'community_score' => $community,
            'fraud_penalty' => $fraud,
            'reason' => $reason,
            'calculated_at' => now(),
        ]);
    }

    public function calculateBehaviorScore(User $user): int
    {
        $points = GreenTransaction::where('user_id', $user->id)->where('created_at', '>=', now()->subDays(90))->sum('points');

        return (int) min(400, max(0, $points / 1000 * 400));
    }

    public function calculateConsistencyScore(User $user): int
    {
        $days = GreenTransaction::where('user_id', $user->id)->where('created_at', '>=', now()->subDays(30))
            ->selectRaw('date(created_at) as scan_day')->distinct()->count();

        return (int) min(200, $days / 20 * 200);
    }

    public function calculateDiversityScore(User $user): int
    {
        $codes = GreenTransaction::where('user_id', $user->id)->where('created_at', '>=', now()->subDays(90))
            ->get()->flatMap(fn ($tx) => collect($tx->metadata['actions'] ?? [])->pluck('code'))->unique()->count();

        return (int) min(150, $codes / 6 * 150);
    }

    public function calculateVerificationScore(User $user): int
    {
        $total = GreenTransaction::where('user_id', $user->id)->count();
        if ($total === 0) {
            return 0;
        }

        $valid = GreenTransaction::where('user_id', $user->id)->where('type', 'invoice_scan')->where('status', 'approved')->count();

        return (int) min(150, $valid / $total * 150);
    }

    public function calculateCommunityScore(User $user): int
    {
        $total = GreenTransaction::where('user_id', $user->id)->count();

        return (int) min(100, $total / 30 * 100);
    }

    public function calculateFraudPenalty(User $user): int
    {
        return (int) min(300, FraudAlert::where('user_id', $user->id)
            ->whereIn('status', ['open', 'reviewing'])
            ->where('created_at', '>=', now()->subDays(90))
            ->sum('risk_score'));
    }

    public function getLevelByScore(int $score): ?GreenLevel
    {
        return GreenLevel::where('min_score', '<=', $score)->where('max_score', '>=', $score)->first();
    }

    public function getCurrentScore(User $user): int
    {
        return (int) ($user->greenScoreHistories()->latest('calculated_at')->first()?->score ?? 0);
    }
}
