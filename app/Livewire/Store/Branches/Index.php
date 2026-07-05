<?php

namespace App\Livewire\Store\Branches;

use App\Livewire\SimplePage;
use App\Models\Store;
use App\Models\StoreStaff;

class Index extends SimplePage
{
    public function mount(): void
    {
        $store = Store::where('owner_id', auth()->id())->first() ?? StoreStaff::where('user_id', auth()->id())->first()?->store;
        abort_unless($store, 403);
        $branches = $store->branches;
        $this->title = 'Chi nhanh cua hang';
        $this->description = 'Quan ly chi nhanh va dia diem tao hoa don xanh.';
        $this->cards = [['Chi nhanh', $branches->count()], ['Dang hoat dong', $branches->where('is_active', true)->count()], ['Store', $store->name]];
        $this->rows = $branches->map(fn ($b) => [$b->name, $b->address, $b->is_active ? 'active' : 'inactive'])->all();
    }
}
