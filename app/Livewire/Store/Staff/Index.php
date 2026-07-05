<?php

namespace App\Livewire\Store\Staff;

use App\Livewire\SimplePage;
use App\Models\Store;
use App\Models\StoreStaff;

class Index extends SimplePage
{
    public function mount(): void
    {
        $store = Store::where('owner_id', auth()->id())->first() ?? StoreStaff::where('user_id', auth()->id())->first()?->store;
        abort_unless($store, 403);
        $staff = $store->staff()->with('user')->get();
        $this->title = 'Nhan vien cua hang';
        $this->description = 'Nhan vien co quyen tao hoa don xanh.';
        $this->cards = [['Nhan vien', $staff->count()], ['Active', $staff->where('is_active', true)->count()], ['Store', $store->name]];
        $this->rows = $staff->map(fn ($s) => [$s->user->name, $s->position ?? 'Staff', $s->is_active ? 'active' : 'inactive'])->all();
    }
}
