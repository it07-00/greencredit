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
        $this->title = 'Dashboard Cửa hàng';
        $this->description = 'Tổng quan hóa đơn xanh, điểm đã phát hành và tác động môi trường của cửa hàng.';
        $this->cards = [
            ['Hóa đơn xanh', $invoices->count()],
            ['Điểm đã phát hành', $invoices->sum('base_points')],
            ['Khách hàng xanh', $invoices->whereNotNull('used_by')->pluck('used_by')->unique()->count()],
            ['Nhựa & CO₂ đã giảm', number_format($invoices->sum('plastic_saved_grams'), 0).'g / '.number_format($invoices->sum('co2_saved_kg'), 2).'kg'],
        ];
        $this->rows = $invoices->take(10)->map(fn ($i) => [$i->invoice_code, $i->status === 'used' ? 'Đã quét' : ($i->status === 'pending' ? 'Chờ quét' : 'Hết hạn'), $i->created_at->format('d/m/Y H:i')])->all();
        $this->actionUrl = route('store.invoices.create');
        $this->actionText = 'Mở POS Thu Ngân';
    }

    private function currentStore(): ?Store
    {
        $user = auth()->user();

        return $user->role === 'store_owner'
            ? Store::where('owner_id', $user->id)->first()
            : StoreStaff::where('user_id', $user->id)->first()?->store;
    }
}
