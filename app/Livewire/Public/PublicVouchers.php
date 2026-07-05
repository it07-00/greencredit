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
        $this->description = 'Uu dai co the doi bang Green Points khi nguoi dung du dieu kien.';
        $this->cards = [['Voucher active', Voucher::where('status', 'active')->count()], ['Diem doi tu', Voucher::min('required_points') ?: 0], ['Luot doi', VoucherRedemption::count()]];
        $this->rows = Voucher::latest()->limit(12)->get()->map(fn ($voucher) => [$voucher->title, $voucher->required_points.' diem', $voucher->status])->all();
    }
}
