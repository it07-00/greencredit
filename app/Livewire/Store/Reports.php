<?php

namespace App\Livewire\Store;

use App\Livewire\SimplePage;

class Reports extends SimplePage
{
    public function mount(): void
    {
        $user = auth()->user();
        $store = $user->role === 'store_owner'
            ? \App\Models\Store::where('owner_id', $user->id)->first()
            : \App\Models\StoreStaff::where('user_id', $user->id)->first()?->store;

        abort_unless($store, 403);

        $invoices = $store->invoices()->latest()->get();

        $totalInvoices = $invoices->count();
        $totalPoints = $invoices->sum('base_points');
        $totalPlasticKg = $invoices->sum('plastic_saved_grams') / 1000;
        $totalCo2Kg = $invoices->sum('co2_saved_kg');

        $this->title = 'Báo cáo cửa hàng: ' . $store->name;
        $this->description = 'Báo cáo hiệu quả sinh thái và thống kê hóa đơn của cửa hàng.';
        
        $this->cards = [
            ['Tổng hóa đơn', $totalInvoices . ' hóa đơn'],
            ['Điểm đã phát', number_format($totalPoints) . ' điểm'],
            ['Nhựa giảm thiểu', number_format($totalPlasticKg, 2) . ' kg'],
            ['CO2 giảm phát', number_format($totalCo2Kg, 2) . ' kg'],
        ];

        $this->tableTitle = 'Danh sách hóa đơn phát sinh';
        $this->rows = $invoices->take(10)->map(fn ($i) => [
            $i->invoice_code,
            $i->status === 'used' ? 'Đã quét' : 'Chờ quét',
            number_format($i->base_points) . ' điểm',
            number_format($i->plastic_saved_grams) . 'g nhựa / ' . number_format($i->co2_saved_kg, 2) . 'kg CO2',
            $i->created_at->format('d/m/Y H:i')
        ])->all();

        $this->actionUrl = route('store.reports.pdf');
        $this->actionText = 'Xuất báo cáo PDF';
    }
}
