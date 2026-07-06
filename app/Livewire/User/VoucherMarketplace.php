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
            $voucher = Voucher::findOrFail($voucherId);
            $redemption = $service->redeemVoucher(auth()->user(), $voucher);

            $this->dispatch('swal', [
                'type' => 'success',
                'title' => 'Đổi Voucher thành công!',
                'html' => 'Mã ưu đãi của bạn là:<br><div class="d-flex align-items-center justify-content-center gap-2 my-3"><strong class="text-success" style="font-size: 22px; letter-spacing: 1px;">' . $redemption->redemption_code . '</strong><button onclick="copyVoucherCode(\'' . $redemption->redemption_code . '\', this)" class="btn btn-sm btn-outline-success" style="padding: 4px 10px; font-size: 12px; border-radius: 6px; border: 1px solid #10b981; color: #10b981; background: transparent; cursor: pointer; transition: all 0.2s;"><i class="far fa-copy me-1"></i> Sao chép</button></div><span class="text-muted small">Hãy lưu lại mã này hoặc xem lại bất cứ lúc nào trong trang <strong>"Voucher của tôi"</strong> để quét tại cửa hàng.</span>',
            ]);
        } catch (Throwable $e) {
            $this->dispatch('swal', [
                'type' => 'error',
                'title' => 'Đổi Voucher thất bại',
                'text' => $e->getMessage(),
            ]);
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
