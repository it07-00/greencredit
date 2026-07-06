<?php

namespace App\Livewire\Store\Vouchers;

use App\Models\Store;
use App\Models\StoreStaff;
use App\Models\VoucherRedemption;
use App\Services\VoucherService;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $code = '';
    public ?VoucherRedemption $redemption = null;
    public ?string $error = null;
    public ?string $success = null;

    public function getStoreProperty(): ?Store
    {
        $user = auth()->user();
        return $user->role === 'store_owner'
            ? Store::where('owner_id', $user->id)->first()
            : StoreStaff::where('user_id', $user->id)->first()?->store;
    }

    public function checkCode(): void
    {
        $this->validate([
            'code' => ['required', 'string'],
        ], [
            'code.required' => 'Vui lòng nhập mã voucher cần kiểm tra.',
        ]);

        $this->error = null;
        $this->success = null;
        $this->redemption = null;

        $store = $this->store;
        if (!$store) {
            $this->error = 'Cửa hàng không tồn tại hoặc tài khoản không có quyền.';
            return;
        }

        // Tìm mã voucher
        $redemption = VoucherRedemption::where('redemption_code', trim($this->code))->first();

        if (!$redemption) {
            $this->error = 'Không tìm thấy mã voucher đổi thưởng này trên hệ thống.';
            return;
        }

        // Kiểm tra xem voucher có thuộc cửa hàng này không (hoặc là voucher hệ thống - store_id = null)
        $voucher = $redemption->voucher;
        if ($voucher->store_id !== null && $voucher->store_id !== $store->id) {
            $this->error = 'Mã voucher này không áp dụng cho cửa hàng của bạn.';
            return;
        }

        $this->redemption = $redemption;
    }

    public function confirmUse(VoucherService $voucherService): void
    {
        if (!$this->redemption) {
            return;
        }

        if ($this->redemption->status !== 'issued') {
            $this->error = 'Voucher này đã được sử dụng hoặc đã hết hạn.';
            return;
        }

        try {
            $voucherService->markAsUsed($this->redemption);
            $this->success = 'Xác nhận sử dụng Voucher thành công! Vui lòng trao quà/ưu đãi cho khách hàng.';
            $this->redemption = null;
            $this->code = '';
        } catch (\Exception $e) {
            $this->error = 'Có lỗi xảy ra: ' . $e->getMessage();
        }
    }

    public function render()
    {
        $store = $this->store;
        abort_unless($store, 403);

        // Lấy lịch sử đổi voucher tại cửa hàng này (bao gồm voucher của store hoặc global)
        $redemptions = VoucherRedemption::with(['voucher', 'user'])
            ->whereHas('voucher', function ($query) use ($store) {
                $query->where('store_id', $store->id)
                    ->orWhereNull('store_id');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.store.vouchers.index', [
            'redemptions' => $redemptions,
        ])->layout('layouts.app');
    }
}
