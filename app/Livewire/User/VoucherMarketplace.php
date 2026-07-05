<?php

namespace App\Livewire\User;

use App\Models\Voucher;
use App\Services\VoucherService;
use Livewire\Component;
use Throwable;

class VoucherMarketplace extends Component
{
    public string $search = '';

    public string $category = '';

    public ?string $message = null;

    public function redeem(int $voucherId, VoucherService $service): void
    {
        try {
            $redemption = $service->redeemVoucher(auth()->user(), Voucher::findOrFail($voucherId));
            $this->message = 'Doi voucher thanh cong. Ma: '.$redemption->redemption_code;
        } catch (Throwable $e) {
            $this->message = $e->getMessage();
        }
    }

    public function render()
    {
        $vouchers = Voucher::where('status', 'active')
            ->when($this->search, fn ($q) => $q->where('title', 'like', '%'.$this->search.'%'))
            ->when($this->category, fn ($q) => $q->where('category', $this->category))
            ->orderBy('required_points')
            ->get();

        return view('livewire.user.voucher-marketplace', compact('vouchers'));
    }
}
