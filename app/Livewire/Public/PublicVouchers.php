<?php

namespace App\Livewire\Public;

use App\Livewire\SimplePage;
use App\Models\Voucher;
use App\Models\VoucherRedemption;

class PublicVouchers extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Voucher xanh';
        $this->description = 'Ưu đãi có thể đổi bằng Green Points khi người dùng đủ điều kiện.';
        $this->cards = [['Voucher hoạt động', Voucher::where('status', 'active')->count()], ['Điểm đổi từ', Voucher::min('required_points') ?: 0], ['Lượt đổi', VoucherRedemption::count()]];
        $this->rows = Voucher::latest()->limit(12)->get()->map(fn ($voucher) => [$voucher->title, $voucher->required_points.' điểm', $voucher->status])->all();
    }
}
