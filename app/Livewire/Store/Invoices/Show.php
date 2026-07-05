<?php

namespace App\Livewire\Store\Invoices;

use App\Models\GreenInvoice;
use App\Models\Store;
use App\Models\StoreStaff;
use Livewire\Component;

class Show extends Component
{
    public GreenInvoice $invoice;

    public function mount(GreenInvoice $invoice): void
    {
        $store = auth()->user()->role === 'store_owner'
            ? Store::where('owner_id', auth()->id())->first()
            : StoreStaff::where('user_id', auth()->id())->first()?->store;
        abort_unless($store && $invoice->store_id === $store->id, 403);
        $this->invoice = $invoice;
    }

    public function render()
    {
        return view('livewire.store.invoices.show');
    }
}
