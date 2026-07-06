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
        $this->title = 'Dashboard Đối tác';
        $this->description = 'Tổng quan voucher, chiến dịch và ưu đãi tài chính.';
        $this->cards = [['Voucher đã tạo', $partner->vouchers()->count()], ['Đã đổi', $partner->vouchers()->sum('used_quantity')], ['Chiến dịch hoạt động', $partner->campaigns()->where('status', 'active')->count()]];
        $this->rows = $partner->vouchers()->latest()->get()->map(fn ($v) => [$v->title, $v->required_points.' điểm', $v->status === 'active' ? 'Hoạt động' : 'Ngừng hoạt động'])->all();
    }
}
