<?php

namespace App\Livewire\User;

use App\Livewire\SimplePage;

class MyVouchers extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Voucher cua toi';
        $this->description = 'Cac voucher da doi bang Green Points.';
        $redemptions = auth()->user()->voucherRedemptions()->with('voucher')->latest()->get();
        $this->cards = [['Tong voucher', $redemptions->count()], ['Da su dung', $redemptions->where('status', 'used')->count()], ['Dang hieu luc', $redemptions->where('status', 'issued')->count()]];
        $this->rows = $redemptions->map(fn ($r) => [$r->voucher->title, $r->redemption_code, $r->status])->all();
    }
}
