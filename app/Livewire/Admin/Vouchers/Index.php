<?php

namespace App\Livewire\Admin\Vouchers;

use App\Livewire\SimplePage;
use App\Models\Voucher;

class Index extends SimplePage
{
    public function mount(): void
    {
        $vouchers = Voucher::latest()->get();
        $this->title = 'Quản lý voucher';
        $this->description = 'Admin xem toàn bộ voucher và trạng thái đổi thưởng.';
        $this->cards = [['Vouchers', $vouchers->count()], ['Active', $vouchers->where('status', 'active')->count()], ['Lượt đổi', $vouchers->sum('used_quantity')]];
        $this->rows = $vouchers->map(fn ($v) => [$v->title, $v->required_points.' điểm', $v->status])->all();
    }
}
