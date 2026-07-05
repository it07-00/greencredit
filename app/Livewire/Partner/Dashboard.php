<?php

namespace App\Livewire\Partner;

use App\Livewire\SimplePage;
use App\Models\Partner;

class Dashboard extends SimplePage
{
    public function mount(): void
    {
        $partner = Partner::where('user_id', auth()->id())->first();
        abort_unless($partner, 403);
        $this->title = 'Partner Dashboard';
        $this->description = 'Tong quan voucher, campaign va uu dai tai chinh.';
        $this->cards = [['Voucher da tao', $partner->vouchers()->count()], ['Da doi', $partner->vouchers()->sum('used_quantity')], ['Campaign active', $partner->campaigns()->where('status', 'active')->count()]];
        $this->rows = $partner->vouchers()->latest()->get()->map(fn ($v) => [$v->title, $v->required_points.' diem', $v->status])->all();
    }
}
