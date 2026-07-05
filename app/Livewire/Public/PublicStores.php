<?php

namespace App\Livewire\Public;

use App\Livewire\SimplePage;
use App\Models\GreenInvoice;
use App\Models\Store;

class PublicStores extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Cua hang doi tac';
        $this->description = 'Danh sach cua hang tao hoa don xanh cho cong dong Green Credit.';
        $this->cards = [['Tong cua hang', Store::count(), 'Dang hoat dong'], ['Thanh pho', '12+', 'Mo phong'], ['Hoa don xanh', GreenInvoice::count(), 'Da tao']];
        $this->rows = Store::latest()->limit(12)->get()->map(fn ($store) => [$store->name, $store->status, $store->created_at->format('d/m/Y')])->all();
    }
}
