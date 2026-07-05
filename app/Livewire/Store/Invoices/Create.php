<?php

namespace App\Livewire\Store\Invoices;

use App\Models\GreenActionRule;
use App\Models\GreenInvoice;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\StoreStaff;
use App\Services\QrInvoiceService;
use Livewire\Component;

class Create extends Component
{
    public ?int $branch_id = null;

    public float $amount = 0;

    public string $payment_method = 'cash';

    public array $actions = [];

    public ?GreenInvoice $invoice = null;

    public function getStoreProperty(): ?Store
    {
        $user = auth()->user();

        return $user->role === 'store_owner'
            ? Store::where('owner_id', $user->id)->first()
            : StoreStaff::where('user_id', $user->id)->first()?->store;
    }

    public function getCalculatedProperty(): array
    {
        return app(QrInvoiceService::class)->calculateInvoicePoints($this->actions);
    }

    public function create(QrInvoiceService $service): void
    {
        $this->validate(['amount' => ['required', 'numeric', 'min:1000'], 'actions' => ['required', 'array', 'min:1']]);
        $store = $this->store;
        abort_unless($store, 403);
        $branch = $this->branch_id ? StoreBranch::where('store_id', $store->id)->findOrFail($this->branch_id) : null;

        $this->invoice = $service->createInvoice($store, $branch, auth()->user(), [
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'actions' => $this->actions,
        ]);
        $this->reset(['amount', 'actions']);
    }

    public function render()
    {
        abort_unless($this->store, 403);

        return view('livewire.store.invoices.create', [
            'branches' => $this->store->branches()->where('is_active', true)->get(),
            'rules' => GreenActionRule::where('is_active', true)->get(),
            'calculated' => $this->calculated,
        ]);
    }
}
