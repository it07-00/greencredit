<?php

namespace App\Livewire\Admin\GreenActionRules;

use App\Livewire\SimplePage;
use App\Models\GreenActionRule;

class Index extends SimplePage
{
    public function mount(): void
    {
        $rules = GreenActionRule::latest()->get();
        $this->title = 'Green Action Rules';
        $this->description = 'Cấu hình điểm cho từng hành động xanh, không hard-code trong component.';
        $this->cards = [['Rules', $rules->count()], ['Active', $rules->where('is_active', true)->count()], ['Tổng điểm', $rules->sum('points')]];
        $this->rows = $rules->map(fn ($r) => [$r->code.' - '.$r->name, '+'.$r->points.' điểm', $r->category])->all();
    }
}
