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
        $this->description = 'Cau hinh diem cho tung hanh dong xanh, khong hard-code trong component.';
        $this->cards = [['Rules', $rules->count()], ['Active', $rules->where('is_active', true)->count()], ['Tong diem', $rules->sum('points')]];
        $this->rows = $rules->map(fn ($r) => [$r->code.' - '.$r->name, '+'.$r->points.' diem', $r->category])->all();
    }
}
