<?php

namespace App\Livewire\Store\Invoices;

use App\Models\GreenActionRule;
use App\Models\GreenInvoice;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\StoreStaff;
use App\Services\QrInvoiceService;
use Livewire\Component;

class Create extends Component
{
    public ?int $branch_id = null;

    public float $amount = 0;

    public string $payment_method = 'cash';

    public array $actions = [];

    public ?GreenInvoice $invoice = null;

    // POS properties
    public string $search = '';
    public string $activeCategory = 'all';
    public array $cart = [];
    public bool $isCustomAmount = false;
    public string $customAmount = '';

    public array $productsList = [
        ['name' => 'Americano Đá/Nóng', 'price' => 45000, 'category' => 'coffee', 'sku' => 'CF-AME-01', 'img' => 'images/img-22-D2w1zjf6.png'],
        ['name' => 'Cà phê Sữa Đá Sài Gòn', 'price' => 49000, 'category' => 'coffee', 'sku' => 'CF-MILK-02', 'img' => 'images/img-22-D2w1zjf6.png'],
        ['name' => 'Matcha Latte Đá Xay', 'price' => 65000, 'category' => 'drinks', 'sku' => 'DK-MAT-03', 'img' => 'images/img-08-BXmGY-HZ.png'],
        ['name' => 'Trà Đào Cam Sả Thảo Mộc', 'price' => 55000, 'category' => 'drinks', 'sku' => 'DK-PEA-04', 'img' => 'images/img-08-BXmGY-HZ.png'],
        ['name' => 'Bánh Mì Thập Cẩm Đặc Biệt', 'price' => 35000, 'category' => 'food', 'sku' => 'FD-BM-05', 'img' => 'images/img-22-D2w1zjf6.png'],
        ['name' => 'Croissant Bơ Pháp Nướng', 'price' => 40000, 'category' => 'food', 'sku' => 'FD-CRO-06', 'img' => 'images/img-22-D2w1zjf6.png'],
        ['name' => 'Bình nước giữ nhiệt Green Credit', 'price' => 150000, 'category' => 'merch', 'sku' => 'MC-CUP-07', 'img' => 'images/img-19-UVF-VI0Q.png'],
        ['name' => 'Túi vải canvas bảo vệ môi trường', 'price' => 30000, 'category' => 'merch', 'sku' => 'MC-BAG-08', 'img' => 'images/img-01-BBWp8t8E.png']
    ];

    public function mount(): void
    {
        $store = $this->store;
        if ($store) {
            $firstBranch = $store->branches()->where('is_active', true)->first();
            if ($firstBranch) {
                $this->branch_id = $firstBranch->id;
            }
        }
    }

    public function getStoreProperty(): ?Store
    {
        $user = auth()->user();

        return $user->role === 'store_owner'
            ? Store::where('owner_id', $user->id)->first()
            : StoreStaff::where('user_id', $user->id)->first()?->store;
    }

    public function getCalculatedProperty(): array
    {
        return app(QrInvoiceService::class)->calculateInvoicePoints($this->actions);
    }

    // POS Cart functions
    public function addToCart(int $index): void
    {
        if ($this->isCustomAmount) {
            $this->isCustomAmount = false;
            $this->customAmount = '';
        }

        $product = $this->productsList[$index] ?? null;
        if (!$product) return;

        // Check if already in cart
        foreach ($this->cart as $key => $item) {
            if ($item['sku'] === $product['sku']) {
                $this->cart[$key]['qty']++;
                $this->updateAmount();
                return;
            }
        }

        $this->cart[] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'qty' => 1,
            'sku' => $product['sku']
        ];

        $this->updateAmount();
    }

    public function removeFromCart(int $index): void
    {
        if (isset($this->cart[$index])) {
            unset($this->cart[$index]);
            $this->cart = array_values($this->cart);
            $this->updateAmount();
        }
    }

    public function incrementQty(int $index): void
    {
        if (isset($this->cart[$index])) {
            $this->cart[$index]['qty']++;
            $this->updateAmount();
        }
    }

    public function decrementQty(int $index): void
    {
        if (isset($this->cart[$index])) {
            if ($this->cart[$index]['qty'] > 1) {
                $this->cart[$index]['qty']--;
            } else {
                unset($this->cart[$index]);
                $this->cart = array_values($this->cart);
            }
            $this->updateAmount();
        }
    }

    public function setCategory(string $category): void
    {
        $this->activeCategory = $category;
    }

    protected function updateAmount(): void
    {
        $this->amount = collect($this->cart)->sum(fn($item) => $item['price'] * $item['qty']);
    }

    public function resetInvoice(): void
    {
        $this->invoice = null;
    }

    public function create(QrInvoiceService $service): void
    {
        if ($this->isCustomAmount) {
            $this->amount = (float) str_replace(',', '', $this->customAmount);
        }

        $this->validate([
            'amount' => ['required', 'numeric', 'min:1000'],
            'actions' => ['required', 'array', 'min:1'],
            'branch_id' => ['required', 'exists:store_branches,id'],
        ], [
            'amount.required' => 'Vui lòng nhập hoặc tính toán số tiền thanh toán.',
            'amount.numeric' => 'Số tiền thanh toán phải là số hợp lệ.',
            'amount.min' => 'Số tiền hóa đơn tối thiểu phải từ 1.000đ.',
            'actions.required' => 'Vui lòng chọn ít nhất một hành động xanh.',
            'branch_id.required' => 'Vui lòng chọn chi nhánh cửa hàng.',
        ]);

        $store = $this->store;
        abort_unless($store, 403);
        $branch = StoreBranch::where('store_id', $store->id)->findOrFail($this->branch_id);

        $this->invoice = $service->createInvoice($store, $branch, auth()->user(), [
            'amount' => $this->amount,
            'payment_method' => $this->payment_method,
            'actions' => $this->actions,
        ]);

        $this->reset(['amount', 'actions', 'cart', 'customAmount', 'isCustomAmount']);
    }

    public function checkPaymentStatus(): void
    {
        if ($this->invoice && $this->invoice->status === 'unpaid') {
            $this->invoice->refresh();
        }
    }

    public function markAsPaid(): void
    {
        if ($this->invoice && $this->invoice->status === 'unpaid') {
            $this->invoice->update(['status' => 'pending']);
            $this->invoice->refresh();
        }
    }

    public function render()
    {
        abort_unless($this->store, 403);

        $filteredProducts = collect($this->productsList)
            ->filter(function($product) {
                if ($this->activeCategory !== 'all' && $product['category'] !== $this->activeCategory) {
                    return false;
                }
                if ($this->search && stripos($product['name'], $this->search) === false) {
                    return false;
                }
                return true;
            });

        return view('livewire.store.invoices.create', [
            'branches' => $this->store->branches()->where('is_active', true)->get(),
            'rules' => GreenActionRule::where('is_active', true)->where('category', 'plastic_reduction')->get(),
            'calculated' => $this->calculated,
            'filteredProducts' => $filteredProducts,
        ])->layout('layouts.pos');
    }
}
