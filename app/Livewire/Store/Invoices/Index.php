<?php

namespace App\Livewire\Store\Invoices;

use App\Livewire\SimplePage;
use App\Models\Store;
use App\Models\StoreStaff;

class Index extends SimplePage
{
    public function mount(): void
    {
        $store = auth()->user()->role === 'store_owner'
            ? Store::where('owner_id', auth()->id())->first()
            : StoreStaff::where('user_id', auth()->id())->first()?->store;
        abort_unless($store, 403);
        $invoices = $store->invoices()->latest()->get();
        $this->title = 'Danh sach hoa don xanh';
        $this->description = 'Hoa don do cua hang cua ban tao.';
        $this->cards = [['Tong hoa don', $invoices->count()], ['Pending', $invoices->where('status', 'pending')->count()], ['Used', $invoices->where('status', 'used')->count()]];
        $this->rows = $invoices->map(fn ($i) => [$i->invoice_code, $i->status.' - '.$i->base_points.' diem', $i->created_at->format('d/m/Y H:i')])->all();
    }
}
