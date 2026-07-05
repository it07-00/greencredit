<?php

namespace App\Livewire\Admin\Partners;

use App\Livewire\SimplePage;
use App\Models\Partner;

class Index extends SimplePage
{
    public function mount(): void
    {
        $partners = Partner::latest()->get();
        $this->title = 'Quan ly partners';
        $this->description = 'Doi tac voucher, tai chinh, wallet va media.';
        $this->cards = [['Partners', $partners->count()], ['Active', $partners->where('status', 'active')->count()], ['Financial', $partners->where('type', 'financial')->count()]];
        $this->rows = $partners->map(fn ($p) => [$p->name, $p->type, $p->status])->all();
    }
}
