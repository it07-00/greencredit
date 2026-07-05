<?php

namespace App\Livewire\Admin\Stores;

use App\Livewire\SimplePage;
use App\Models\Store;

class Index extends SimplePage
{
    public function mount(): void
    {
        $stores = Store::with('owner')->latest()->get();
        $this->title = 'Quan ly cua hang';
        $this->description = 'Duyet va theo doi cua hang doi tac.';
        $this->cards = [['Stores', $stores->count()], ['Active', $stores->where('status', 'active')->count()], ['Pending', $stores->where('status', 'pending')->count()]];
        $this->rows = $stores->map(fn ($s) => [$s->name, $s->owner?->email ?? 'N/A', $s->status])->all();
    }
}
