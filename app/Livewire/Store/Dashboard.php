<?php

namespace App\Livewire\Store;

use App\Livewire\SimplePage;
use App\Models\Store;
use App\Models\StoreStaff;

class Dashboard extends SimplePage
{
    public function mount(): void
    {
        $store = $this->currentStore();
        $invoices = $store?->invoices()->latest()->get() ?? collect();
        $this->title = 'Store Dashboard';
        $this->description = 'Tong quan hoa don xanh, diem da phat hanh va tac dong moi truong cua cua hang.';
        $this->cards = [
            ['Hoa don xanh', $invoices->count()],
            ['Diem da phat hanh', $invoices->sum('base_points')],
            ['Khach hang xanh', $invoices->whereNotNull('used_by')->pluck('used_by')->unique()->count()],
            ['Nhua/CO2 giam', number_format($invoices->sum('plastic_saved_grams'), 0).'g / '.number_format($invoices->sum('co2_saved_kg'), 2).'kg'],
        ];
        $this->rows = $invoices->take(10)->map(fn ($i) => [$i->invoice_code, $i->status, $i->created_at->format('d/m/Y H:i')])->all();
    }

    private function currentStore(): ?Store
    {
        $user = auth()->user();

        return $user->role === 'store_owner'
            ? Store::where('owner_id', $user->id)->first()
            : StoreStaff::where('user_id', $user->id)->first()?->store;
    }
}
