<?php

namespace App\Livewire\Partner\Vouchers;

use App\Models\ActivityLog;
use App\Models\Partner;
use App\Models\Voucher;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Index extends Component
{
    public ?int $editingId = null;

    public string $title = '';

    public string $code = '';

    public string $description = '';

    public string $category = 'other';

    public int $required_points = 100;

    public string $discount_type = 'fixed';

    public float $discount_value = 0;

    public ?int $quantity = 100;

    public int $min_green_score = 0;

    public string $status = 'draft';

    public string $expired_at = '';

    public string $terms = '';

    private function partner(): Partner
    {
        return Partner::where('user_id', auth()->id())->firstOrFail();
    }

    public function edit(int $id): void
    {
        $voucher = $this->partner()->vouchers()->findOrFail($id);
        $this->editingId = $voucher->id;
        $this->fill($voucher->only([
            'title', 'code', 'description', 'category', 'required_points', 'discount_type',
            'discount_value', 'quantity', 'min_green_score', 'status', 'terms',
        ]));
        $this->expired_at = $voucher->expired_at?->format('Y-m-d') ?? '';
    }

    public function save(): void
    {
        $data = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:50', Rule::unique('vouchers')->ignore($this->editingId)],
            'description' => ['nullable', 'string'],
            'category' => ['required', Rule::in(['cafe', 'milk_tea', 'supermarket', 'wallet', 'transport', 'finance', 'other'])],
            'required_points' => ['required', 'integer', 'min:0'],
            'discount_type' => ['required', Rule::in(['percent', 'fixed', 'cashback', 'other'])],
            'discount_value' => ['required', 'numeric', 'min:0'],
            'quantity' => ['nullable', 'integer', 'min:1'],
            'min_green_score' => ['required', 'integer', 'between:0,1000'],
            'status' => ['required', Rule::in(['draft', 'active', 'inactive', 'expired'])],
            'expired_at' => ['nullable', 'date', 'after:today'],
            'terms' => ['nullable', 'string'],
        ]);

        $voucher = $this->editingId
            ? $this->partner()->vouchers()->findOrFail($this->editingId)
            : new Voucher(['partner_id' => $this->partner()->id, 'used_quantity' => 0]);
        $voucher->fill($data + ['started_at' => $data['status'] === 'active' ? now() : null])->save();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $this->editingId ? 'update_partner_voucher' : 'create_partner_voucher',
            'description' => "Cập nhật voucher {$voucher->code}",
            'subject_type' => Voucher::class,
            'subject_id' => $voucher->id,
        ]);

        session()->flash('success', 'Đã lưu voucher mô phỏng.');
        $this->cancel();
    }

    public function cancel(): void
    {
        $this->reset();
        $this->required_points = 100;
        $this->quantity = 100;
        $this->category = 'other';
        $this->discount_type = 'fixed';
        $this->status = 'draft';
    }

    public function render()
    {
        $partner = $this->partner();

        return view('livewire.partner.vouchers.index', [
            'partner' => $partner,
            'vouchers' => $partner->vouchers()->latest()->get(),
        ]);
    }
}
