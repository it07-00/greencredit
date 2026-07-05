<?php

namespace App\Livewire\Partner\Vouchers;

use App\Livewire\SimplePage;
use App\Models\Partner;

class Index extends SimplePage
{
    public function mount(): void
    {
        $partner = Partner::where('user_id', auth()->id())->first();
        abort_unless($partner, 403);
        $vouchers = $partner->vouchers;
        $this->title = 'Partner Vouchers';
        $this->description = 'Voucher thuoc doi tac dang dang nhap.';
        $this->cards = [['Vouchers', $vouchers->count()], ['Active', $vouchers->where('status', 'active')->count()], ['Luot doi', $vouchers->sum('used_quantity')]];
        $this->rows = $vouchers->map(fn ($v) => [$v->title, $v->required_points.' diem', $v->status])->all();
    }
}
