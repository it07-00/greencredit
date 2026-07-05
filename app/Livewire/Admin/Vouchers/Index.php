<?php

namespace App\Livewire\Admin\Vouchers;

use App\Livewire\SimplePage;
use App\Models\Voucher;

class Index extends SimplePage
{
    public function mount(): void
    {
        $vouchers = Voucher::latest()->get();
        $this->title = 'Quan ly voucher';
        $this->description = 'Admin xem toan bo voucher va trang thai doi thuong.';
        $this->cards = [['Vouchers', $vouchers->count()], ['Active', $vouchers->where('status', 'active')->count()], ['Luot doi', $vouchers->sum('used_quantity')]];
        $this->rows = $vouchers->map(fn ($v) => [$v->title, $v->required_points.' diem', $v->status])->all();
    }
}
