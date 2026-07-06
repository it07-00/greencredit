<?php

namespace App\Livewire\User;

use App\Models\VoucherRedemption;
use Livewire\Component;
use Livewire\WithPagination;

class MyVouchers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $statusFilter = 'all'; // all, active, used, expired

    public function changeFilter(string $filter): void
    {
        $this->statusFilter = $filter;
        $this->resetPage();
    }

    public function render()
    {
        $query = auth()->user()->voucherRedemptions()->with(['voucher.store', 'voucher.partner']);

        // Stats
        $stats = [
            'total' => (clone $query)->count(),
            'used' => (clone $query)->where('status', 'used')->count(),
            'active' => (clone $query)->where('status', 'issued')->count(),
        ];

        // Filter
        $query->when($this->statusFilter !== 'all', function ($q) {
            $status = $this->statusFilter === 'active' ? 'issued' : $this->statusFilter;
            $q->where('status', $status);
        });

        $redemptions = $query->latest()->paginate(9);

        return view('livewire.user.my-vouchers', [
            'redemptions' => $redemptions,
            'stats' => $stats,
        ])->layout('layouts.app');
    }
}
