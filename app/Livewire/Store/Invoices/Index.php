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
        $this->title = 'Danh sách hóa đơn xanh';
        $this->description = 'Hóa đơn xanh do cửa hàng của bạn tạo.';
        $this->cards = [['Tổng hóa đơn', $invoices->count()], ['Chờ quét', $invoices->where('status', 'pending')->count() + $invoices->where('status', 'unpaid')->count()], ['Đã quét', $invoices->where('status', 'used')->count()]];

        $statusMap = [
            'unpaid' => 'Chưa thanh toán',
            'pending' => 'Chờ quét',
            'used' => 'Đã quét',
            'expired' => 'Hết hạn',
        ];

        $this->rows = $invoices->map(fn ($i) => [
            $i->invoice_code,
            ($statusMap[$i->status] ?? $i->status) . ' - ' . $i->base_points . ' điểm',
            $i->created_at->format('d/m/Y H:i'),
            route('store.invoices.show', $i)
        ])->all();
        $this->actionUrl = route('store.invoices.create');
        $this->actionText = 'Mở POS Thu Ngân';
    }
}
