<?php

namespace App\Livewire\Partner\FinancialOffers;

use App\Livewire\SimplePage;
use App\Models\Partner;

class Index extends SimplePage
{
    public function mount(): void
    {
        $partner = Partner::where('user_id', auth()->id())->firstOrFail();
        $offers = $partner->financialOffers()->latest()->get();
        $this->title = 'Financial Offers';
        $this->description = 'Mo phong uu dai tai chinh dua tren Green Score.';
        $this->cards = [['Offers', $offers->count()], ['Active', $offers->where('status', 'active')->count()], ['Min score avg', (int) $offers->avg('min_green_score')]];
        $this->rows = $offers->map(fn ($o) => [$o->title, 'Score '.$o->min_green_score, $o->status])->all();
    }
}
