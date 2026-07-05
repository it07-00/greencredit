<?php

namespace App\Livewire\Partner\Campaigns;

use App\Livewire\SimplePage;
use App\Models\Partner;

class Index extends SimplePage
{
    public function mount(): void
    {
        $partner = Partner::where('user_id', auth()->id())->firstOrFail();
        $campaigns = $partner->campaigns()->latest()->get();
        $this->title = 'Partner Campaigns';
        $this->description = 'Quan ly chien dich uu dai va nhan thuc xanh.';
        $this->cards = [['Campaign', $campaigns->count()], ['Active', $campaigns->where('status', 'active')->count()], ['Budget', number_format((float) $campaigns->sum('budget'))]];
        $this->rows = $campaigns->map(fn ($c) => [$c->title, $c->type, $c->status])->all();
    }
}
