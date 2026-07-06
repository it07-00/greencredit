<div class="container-fluid px-0">
    <div class="row g-0 pos-wrapper">
        <!-- Cột Bên Trái: Menu & Sản phẩm -->
        <div class="col-lg-8 col-xl-9">
            <div class="position-relative">
                <!-- Topbar -->
                <header class="main-topbar start-0 position-absolute d-flex align-items-center justify-content-between px-4" id="main-topbar" style="height: 70px; background: #fff; border-bottom: 1px solid #e2e8f0; width: 100%;">
                    <div class="d-flex align-items-center gap-3">
                        <a href="{{ route('home') }}" class="navbar-brand">
                            <strong style="font-size: 20px; color: #15803d; font-family: 'Plus Jakarta Sans', sans-serif;">Green Credit POS</strong>
                        </a>
                        <span class="badge bg-success-subtle text-success border border-success-200 px-3 py-2 rounded-pill d-none d-md-inline-block">
                            <span class="size-1-5 d-inline-block rounded-circle bg-success me-1" style="width: 8px; height: 8px;"></span>
                            Thiết bị POS Hoạt Động
                        </span>
                    </div>

                    <div class="d-flex align-items-center gap-3">
                        @php
                            $store = $this->store;
                        @endphp
                        @if ($store)
                            <div class="text-end d-none d-sm-block">
                                <h6 class="mb-0 fw-semibold text-dark">{{ $store->name }}</h6>
                                <p class="mb-0 text-muted small">Nhân viên: {{ auth()->user()->name }}</p>
                            </div>
                        @endif

                        <a href="/partner" class="btn btn-outline-dark btn-sm d-flex align-items-center gap-2 px-3 py-2">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                        <form method="post" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm px-3 py-2" title="Đăng xuất">
                                <i class="bi bi-power"></i>
                            </button>
                        </form>
                    </div>
                </header>
            </div>

            <div class="pos-left-side d-flex flex-wrap flex-md-nowrap" style="margin-top: 70px;">
                <!-- Thanh Danh mục dọc -->
                <div class="p-4 border-end shadow-sm bg-body-secondary category-wrapper d-flex flex-column align-items-center" style="width: 100px; min-height: calc(100vh - 70px); background-color: #f8fafc;">
                    <div class="nav flex-column gap-3 text-center w-100">
                        <button wire:click="setCategory('all')" class="btn w-100 p-2 d-flex flex-column align-items-center rounded-3 border-0 {{ $activeCategory === 'all' ? 'shadow text-white' : 'text-dark bg-light' }}" style="transition: all 0.2s; {{ $activeCategory === 'all' ? 'background-color: #10b981 !important; color: white !important;' : '' }}">
                            <i class="bi bi-grid-fill fs-4"></i>
                            <span class="small fw-semibold mt-1">Tất cả</span>
                        </button>
                        <button wire:click="setCategory('coffee')" class="btn w-100 p-2 d-flex flex-column align-items-center rounded-3 border-0 {{ $activeCategory === 'coffee' ? 'shadow text-white' : 'text-dark bg-light' }}" style="transition: all 0.2s; {{ $activeCategory === 'coffee' ? 'background-color: #10b981 !important; color: white !important;' : '' }}">
                            <i class="bi bi-cup-hot-fill fs-4"></i>
                            <span class="small fw-semibold mt-1">Cà phê</span>
                        </button>
                        <button wire:click="setCategory('drinks')" class="btn w-100 p-2 d-flex flex-column align-items-center rounded-3 border-0 {{ $activeCategory === 'drinks' ? 'shadow text-white' : 'text-dark bg-light' }}" style="transition: all 0.2s; {{ $activeCategory === 'drinks' ? 'background-color: #10b981 !important; color: white !important;' : '' }}">
                            <i class="bi bi-moisture fs-4"></i>
                            <span class="small fw-semibold mt-1">Đồ uống</span>
                        </button>
                        <button wire:click="setCategory('food')" class="btn w-100 p-2 d-flex flex-column align-items-center rounded-3 border-0 {{ $activeCategory === 'food' ? 'shadow text-white' : 'text-dark bg-light' }}" style="transition: all 0.2s; {{ $activeCategory === 'food' ? 'background-color: #10b981 !important; color: white !important;' : '' }}">
                            <i class="bi bi-egg-fried fs-4"></i>
                            <span class="small fw-semibold mt-1">Đồ ăn</span>
                        </button>
                        <button wire:click="setCategory('merch')" class="btn w-100 p-2 d-flex flex-column align-items-center rounded-3 border-0 {{ $activeCategory === 'merch' ? 'shadow text-white' : 'text-dark bg-light' }}" style="transition: all 0.2s; {{ $activeCategory === 'merch' ? 'background-color: #10b981 !important; color: white !important;' : '' }}">
                            <i class="bi bi-gift-fill fs-4"></i>
                            <span class="small fw-semibold mt-1">Đồ xanh</span>
                        </button>
                    </div>
                </div>

                <!-- Lưới sản phẩm -->
                <div class="p-4 flex-grow-1" style="background-color: #f1f5f9; min-height: calc(100vh - 70px);">
                    <!-- Tìm kiếm sản phẩm -->
                    <div class="row mb-4 align-items-center">
                        <div class="col-md-6 col-lg-4">
                            <div class="position-relative">
                                <input wire:model.live.debounce.400ms="search" type="text" class="form-control ps-5 py-2 border-0 shadow-sm rounded-3" placeholder="Tìm sản phẩm...">
                                <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Danh sách thẻ sản phẩm -->
                    <div class="row g-4 position-relative">
                        <!-- Product Grid Loading Overlay -->
                        <div wire:loading wire:target="setCategory, search" class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(241, 245, 249, 0.7); z-index: 10; backdrop-filter: blur(1px);">
                            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                                <div class="spinner-border text-emerald" role="status" style="color: #10b981;">
                                    <span class="visually-hidden">Đang tải...</span>
                                </div>
                            </div>
                        </div>
                        @forelse ($filteredProducts as $index => $product)
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card border-0 shadow-sm rounded-3 overflow-hidden h-100" style="transition: transform 0.2s; cursor: pointer;" onclick="document.getElementById('add-btn-{{ $index }}').click();">
                                    <div class="p-3 bg-light d-flex align-items-center justify-content-center" style="height: 140px;">
                                        <img src="{{ asset('theme-pos/' . $product['img']) }}" alt="{{ $product['name'] }}" class="img-fluid" style="max-height: 110px; object-fit: contain;">
                                    </div>
                                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="fw-semibold text-dark mb-1 text-truncate" title="{{ $product['name'] }}">{{ $product['name'] }}</h6>
                                            <p class="text-muted small mb-2">SKU: {{ $product['sku'] }}</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-2">
                                            <h6 class="fw-bold text-success mb-0">{{ number_format($product['price'], 0, ',', '.') }} VNĐ</h6>
                                            <button wire:click.stop="addToCart({{ $index }})" id="add-btn-{{ $index }}" class="btn btn-emerald btn-icon rounded-circle shadow-sm" style="width: 32px; height: 32px; padding: 0; background-color: #10b981; color: #fff;">
                                                <i class="bi bi-plus fs-5"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <i class="bi bi-info-circle fs-2 text-muted"></i>
                                <p class="text-muted mt-2">Không tìm thấy sản phẩm nào.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Cột Bên Phải: Chi tiết Đơn hàng & Hành động xanh -->
        <div class="col-lg-4 col-xl-3 border-start bg-white d-flex flex-column shadow-lg" style="height: 100vh; position: sticky; top: 0; background-color: #fff;">
            <div class="p-4 border-bottom">
                <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-receipt text-success"></i> Hóa đơn hiện tại
                </h5>

                <!-- Chọn chế độ nhập tiền -->
                <div class="nav nav-pills nav-fill bg-light p-1 rounded-3 mb-3 animate-fade-in" style="font-size: 13px;">
                    <button wire:click="$set('isCustomAmount', false)" class="nav-link py-2 rounded-2 fw-semibold {{ !$isCustomAmount ? 'bg-white text-success shadow-sm' : 'text-muted' }}" type="button" style="font-size: 12px; border: none;">Chọn sản phẩm</button>
                    <button wire:click="$set('isCustomAmount', true)" class="nav-link py-2 rounded-2 fw-semibold {{ $isCustomAmount ? 'bg-white text-success shadow-sm' : 'text-muted' }}" type="button" style="font-size: 12px; border: none;">Nhập số tiền</button>
                </div>
                
                <!-- Chọn chi nhánh -->
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-muted">Chi nhánh cửa hàng</label>
                    <select wire:model="branch_id" class="form-select rounded-3 border-light shadow-sm">
                        <option value="">-- Chọn chi nhánh --</option>
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                        @endforeach
                    </select>
                    @error('branch_id') <span class="text-danger small">{{ $message }}</span> @enderror
                </div>

                 <!-- Phương thức thanh toán -->
                <div>
                    <label class="form-label small fw-semibold text-muted">Phương thức thanh toán</label>
                    <div class="d-flex gap-2">
                        <button wire:click="$set('payment_method', 'cash')" class="btn btn-sm flex-fill border py-2 rounded-3 {{ $payment_method === 'cash' ? 'bg-emerald-50 text-emerald-800 border-emerald-600 fw-semibold' : 'btn-light' }}"><i class="bi bi-cash me-1"></i> Tiền mặt</button>
                        <button wire:click="$set('payment_method', 'vietqr')" class="btn btn-sm flex-fill border py-2 rounded-3 {{ $payment_method === 'vietqr' ? 'bg-emerald-50 text-emerald-800 border-emerald-600 fw-semibold' : 'btn-light' }}"><i class="bi bi-qr-code me-1"></i> Chuyển khoản VietQR</button>
                    </div>
                </div>
            </div>

            <!-- Danh sách vật phẩm trong giỏ hoặc nhập tiền tùy chỉnh -->
            <div class="p-4 flex-grow-1 overflow-y-auto position-relative" style="max-height: 35vh;">
                <!-- Cart Update Spinner Overlay -->
                <div wire:loading wire:target="addToCart, incrementQty, decrementQty, removeFromCart" class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(255, 255, 255, 0.7); z-index: 10; backdrop-filter: blur(1px);">
                    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
                        <div class="spinner-border text-emerald spinner-border-sm" role="status" style="color: #10b981;">
                            <span class="visually-hidden">Đang xử lý...</span>
                        </div>
                    </div>
                </div>
                @if ($isCustomAmount)
                    <div class="py-3 animate-fade-in">
                        <label class="form-label small fw-semibold text-muted mb-2">Nhập số tiền hóa đơn thực tế</label>
                        <div class="input-group input-group-lg shadow-sm rounded-3 overflow-hidden border border-success-subtle">
                            <span class="input-group-text bg-light text-success border-0"><i class="bi bi-cash-coin fs-4"></i></span>
                            <input wire:model.live.debounce.400ms="customAmount" type="number" class="form-control border-0 py-3 text-end fw-bold text-dark fs-4" placeholder="0" min="1000">
                            <span class="input-group-text bg-light text-muted border-0 fw-semibold">VND</span>
                        </div>
                        @error('amount')
                            <span class="text-danger small mt-2 d-block fw-semibold"><i class="bi bi-exclamation-circle-fill me-1"></i> {{ $message }}</span>
                        @enderror
                        <p class="text-muted small mt-3 mb-0">
                            <i class="bi bi-info-circle-fill text-success"></i> Sử dụng chế độ này khi bạn chỉ muốn nhập tổng giá trị hóa đơn từ phần mềm bán hàng chính mà không cần chọn từng món.
                        </p>
                    </div>
                @else
                    @if (empty($cart))
                        <div class="text-center py-5">
                            <img src="{{ asset('theme-pos/images/no-order-CCjZwO4J.svg') }}" style="max-width: 90px;" class="mb-3 opacity-75">
                            <p class="text-muted small">Chưa có sản phẩm nào. Hãy click vào sản phẩm ở menu bên trái.</p>
                        </div>
                    @else
                        <table class="table table-borderless align-middle table-sm">
                            <thead>
                                <tr class="text-muted small border-bottom">
                                    <th>Sản phẩm</th>
                                    <th class="text-center" style="width: 100px;">SL</th>
                                    <th class="text-end" style="width: 80px;">Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $key => $item)
                                    <tr class="border-bottom" style="border-bottom-style: dashed !important;">
                                        <td class="py-2">
                                            <div class="fw-semibold text-dark text-truncate" style="max-width: 140px;">{{ $item['name'] }}</div>
                                            <div class="text-muted small">{{ number_format($item['price'], 0, ',', '.') }} VNĐ</div>
                                        </td>
                                        <td class="py-2 text-center">
                                            <div class="d-flex align-items-center justify-content-center gap-1 border rounded-3 p-1" style="background-color: #f8fafc;">
                                                <button wire:click="decrementQty({{ $key }})" class="btn btn-link btn-sm p-0 m-0 text-dark decoration-none" style="width: 20px;"><i class="bi bi-minus"></i></button>
                                                <span class="fw-semibold px-2 small">{{ $item['qty'] }}</span>
                                                <button wire:click="incrementQty({{ $key }})" class="btn btn-link btn-sm p-0 m-0 text-dark decoration-none" style="width: 20px;"><i class="bi bi-plus"></i></button>
                                            </div>
                                        </td>
                                        <td class="py-2 text-end">
                                            <div class="fw-bold text-dark">{{ number_format($item['price'] * $item['qty'], 0, ',', '.') }} VNĐ</div>
                                            <button wire:click="removeFromCart({{ $key }})" class="btn btn-link btn-sm p-0 text-danger" title="Xóa"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                @endif
            </div>

            <!-- Hành động xanh (Green Actions) -->
            <div class="p-4 bg-light border-top border-bottom">
                <h6 class="fw-bold mb-3 text-emerald-800 d-flex align-items-center gap-2">
                    <i class="bi bi-leaf-fill"></i> Hành động xanh của khách
                </h6>
                <div class="row g-2" x-data="{ selectedActions: @entangle('actions').live }">
                    @foreach ($rules as $rule)
                        <div class="col-6">
                            <label class="d-flex flex-column align-items-center justify-content-center p-2 rounded-3 border text-center cursor-pointer transition-all" 
                                   style="margin-bottom: 0px; min-height: 65px;"
                                   :style="(selectedActions || []).includes('{{ $rule->code }}') 
                                       ? 'border-color: #10b981; background-color: #ecfdf5;' 
                                       : 'border-color: #e2e8f0; background-color: #ffffff;'"
                            >
                                <input type="checkbox" x-model="selectedActions" value="{{ $rule->code }}" class="d-none">
                                <div class="small fw-bold" 
                                     :class="(selectedActions || []).includes('{{ $rule->code }}') ? 'text-success' : 'text-dark'" 
                                     style="font-size: 12px; line-height: 1.2;">
                                     {{ $rule->name }}
                                </div>
                                <div class="text-success small mt-1" style="font-size: 10px; font-weight: 700;">+{{ $rule->points }} điểm</div>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('actions')
                    <div class="alert alert-danger p-2 rounded-3 small mt-3 mb-0" role="alert" style="font-size: 11px;">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Áp dụng Voucher giảm giá -->
            <div class="p-4 bg-white border-top border-bottom" style="background-color: #fafafa !important;">
                <h6 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2" style="font-size: 13px;">
                    <i class="bi bi-ticket-perforated"></i> Áp dụng Voucher giảm giá
                </h6>
                @if ($appliedVoucherCode)
                    <div class="p-2.5 rounded-3 d-flex align-items-center justify-content-between border border-success-subtle bg-success-subtle text-success mb-2" style="background-color: #ecfdf5; border-color: #a7f3d0 !important;">
                        <div>
                            <span class="small fw-bold d-block" style="font-size: 12px; color: #047857;">{{ $appliedVoucherCode }}</span>
                            <span class="small" style="font-size: 11px; color: #065f46;">Giảm giá: -{{ number_format($discountAmount, 0, ',', '.') }} VNĐ</span>
                        </div>
                        <button type="button" wire:click="removeVoucher" class="btn btn-link text-danger p-0 border-0 text-decoration-none">
                            <i class="bi bi-x-circle-fill fs-5"></i>
                        </button>
                    </div>
                @else
                    <div class="input-group input-group-sm">
                        <input type="text" wire:model.defer="voucherCode" placeholder="Nhập mã voucher (VC-X...)" class="form-control" style="text-transform: uppercase; font-size: 12px;">
                        <button type="button" wire:click="applyVoucher" class="btn text-white px-3" style="background-color: #10b981; border-color: #10b981; font-size: 12px;">
                            ÁP DỤNG
                        </button>
                    </div>
                    @if ($voucherError)
                        <div class="text-danger mt-1 small" style="font-size: 11px;"><i class="bi bi-exclamation-circle-fill"></i> {{ $voucherError }}</div>
                    @endif
                @endif
            </div>

            <!-- Tổng kết tiền & điểm -->
            <div class="p-4 bg-white border-top">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Tổng tiền hàng:</span>
                    <strong class="text-dark">{{ number_format($isCustomAmount ? (float)$customAmount : $amount, 0, ',', '.') }} VNĐ</strong>
                </div>
                @if ($discountAmount > 0)
                    <div class="d-flex justify-content-between mb-2 text-danger">
                        <span class="small">Voucher giảm giá:</span>
                        <span class="small fw-semibold">-{{ number_format($discountAmount, 0, ',', '.') }} VNĐ</span>
                    </div>
                @endif
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted fw-bold">Tổng thanh toán:</span>
                    <strong class="text-dark" style="font-size: 18px; color: #059669;">{{ number_format($this->final_amount, 0, ',', '.') }} VNĐ</strong>
                </div>
                <div class="d-flex justify-content-between mb-3 text-success">
                    <span>Điểm xanh tích lũy dự kiến:</span>
                    <strong class="fw-bold">+{{ $calculated['points'] }} điểm ({{ $calculated['plastic_saved_grams'] }}g nhựa, {{ $calculated['co2_saved_kg'] }}kg CO2)</strong>
                </div>

                @error('amount')
                    <div class="alert alert-danger p-2 rounded-3 small mb-3" role="alert" style="font-size: 11px;">
                        <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ $message }}
                    </div>
                @enderror

                <button wire:click="create" class="btn btn-emerald w-100 py-3 rounded-3 text-white fw-bold shadow d-flex align-items-center justify-content-center gap-2" style="background-color: #059669; border-color: #059669;">
                    <i class="bi bi-qr-code-scan"></i> THANH TOÁN & XUẤT QR CODE
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Kết Quả Hoá Đơn & Mã QR Tích Điểm -->
    @if ($invoice)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.6); z-index: 1050; backdrop-filter: blur(4px);" wire:poll.3s="checkPaymentStatus">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                    <!-- Header -->
                    <div class="modal-header bg-emerald-700 text-white p-4 border-0 d-flex justify-content-between align-items-center" style="background-color: #047857;">
                        <h5 class="modal-title fw-bold d-flex align-items-center gap-2">
                            <i class="bi bi-check-circle-fill"></i> Hoá đơn tạo thành công
                        </h5>
                        <button wire:click="resetInvoice" type="button" class="btn-close btn-close-white" aria-label="Close"></button>
                    </div>
                    <!-- Body -->
                    <div class="modal-body p-4">
                        <div class="text-center mb-4">
                            <p class="text-muted mb-1 font-semibold small">Mã hóa đơn</p>
                            <h4 class="fw-bold text-dark mb-0" style="font-family: 'Plus Jakarta Sans', sans-serif;">{{ $invoice->invoice_code }}</h4>
                            <span class="badge {{ $invoice->status === 'unpaid' ? 'bg-warning text-dark' : 'bg-success text-white' }} px-3 py-2 rounded-pill mt-2">
                                <i class="far {{ $invoice->status === 'unpaid' ? 'fa-spinner fa-spin' : 'fa-check-circle' }} me-1"></i>
                                {{ $invoice->status === 'unpaid' ? 'Chờ thanh toán qua SePay...' : 'Đã thanh toán thành công' }}
                            </span>
                        </div>

                        <!-- Side by Side QR Codes -->
                        <div class="row g-4 justify-content-center mb-4">
                            <!-- VietQR Payment (Left) -->
                            <div class="col-md-6 text-center border-end">
                                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-wallet2 text-primary"></i> 1. Thanh toán VietQR (SePay)</h6>
                                @if($invoice->status === 'unpaid')
                                    <div class="mx-auto p-3 bg-light rounded-4 mb-2 d-flex flex-column align-items-center justify-content-center" style="max-width: 240px; border: 1px solid #e2e8f0; min-height: 200px;">
                                        <img src="https://img.vietqr.io/image/{{ \App\Models\SystemSetting::get('sepay_bank_id', 'VietinBank') }}-{{ \App\Models\SystemSetting::get('sepay_account_no', '102873849182') }}-compact2.png?amount={{ (int)$invoice->amount }}&addInfo={{ $invoice->invoice_code }}&accountName={{ urlencode(\App\Models\SystemSetting::get('sepay_account_name', 'CONG TY GREEN CREDIT')) }}" alt="VietQR Payment" class="img-fluid rounded-2 shadow-sm" style="max-height: 180px;">
                                    </div>
                                    <p class="text-muted small mt-2">
                                        Ngân hàng: <strong>{{ \App\Models\SystemSetting::get('sepay_bank_id', 'VietinBank') }}</strong><br>
                                        Số tiền: <strong class="text-danger">{{ number_format($invoice->amount, 0, ',', '.') }} VNĐ</strong><br>
                                        Nội dung CK: <strong class="text-primary">{{ $invoice->invoice_code }}</strong>
                                    </p>
                                @else
                                    <div class="mx-auto p-3 rounded-4 mb-2 d-flex flex-column align-items-center justify-content-center bg-success-subtle text-success" style="max-width: 240px; min-height: 200px; border: 2px dashed #22c55e;">
                                        <i class="bi bi-check-circle-fill text-success" style="font-size: 64px;"></i>
                                        <h5 class="fw-bold mt-2">ĐÃ THANH TOÁN</h5>
                                        <span class="small text-muted">{{ number_format($invoice->amount, 0, ',', '.') }} VNĐ</span>
                                    </div>
                                    <p class="text-success small mt-2 fw-semibold">Giao dịch đã được ghi nhận qua SePay.</p>
                                @endif
                            </div>

                            <!-- Green Credit (Right) -->
                            <div class="col-md-6 text-center">
                                <h6 class="fw-bold text-success mb-3"><i class="bi bi-leaf-fill"></i> 2. Quét Nhận Điểm Xanh</h6>
                                @if($invoice->status === 'unpaid')
                                    <div class="mx-auto p-4 bg-dark rounded-4 mb-2 d-flex flex-column align-items-center justify-content-center position-relative" style="max-width: 240px; aspect-ratio: 1; background-color: #1e293b; height: 206px;">
                                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column align-items-center justify-content-center rounded-4" style="background: rgba(15, 23, 42, 0.95); z-index: 10;">
                                            <i class="bi bi-lock-fill text-warning fa-bounce mb-2" style="font-size: 32px;"></i>
                                            <span class="text-warning small fw-bold px-2 text-center" style="font-size: 11px;">MÃ KHÓA TÍCH ĐIỂM<br><span class="text-white-50 font-normal">Vui lòng thanh toán trước</span></span>
                                        </div>
                                    </div>
                                    <p class="text-muted small mt-2">Phần thưởng: <strong>+{{ $invoice->base_points }} Green Points</strong></p>
                                    <button wire:click="markAsPaid" class="btn btn-sm btn-outline-success rounded-pill px-3 fw-bold mt-1"><i class="bi bi-cash-coin me-1"></i> Xác nhận đã thu tiền mặt</button>
                                @else
                                    <div class="mx-auto p-4 bg-dark rounded-4 mb-2 d-flex flex-column align-items-center justify-content-center" style="max-width: 240px; aspect-ratio: 1; background-color: #0f172a; height: 206px;">
                                        <span class="text-white small mb-2 tracking-widest fw-semibold" style="font-size: 10px;">QUÉT MÃ TÍCH ĐIỂM</span>
                                        <div class="p-2 bg-white rounded-3 shadow">
                                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ urlencode(route('user.scan-qr', ['token' => $invoice->qr_token])) }}" alt="QR Code" style="width: 120px; height: 120px;">
                                        </div>
                                        <span class="text-emerald-400 small mt-2 fw-bold" style="font-size: 10px;">GREEN CREDIT PLATFORM</span>
                                    </div>
                                    <p class="text-success small mt-2">Phần thưởng: <strong>+{{ $invoice->base_points }} Green Points</strong></p>
                                    <span class="badge bg-success-subtle text-success border border-success-200 rounded-pill px-3 py-1 fw-bold"><i class="bi bi-unlock-fill me-1"></i> Mã đã mở khóa</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-3 bg-success-subtle text-success border border-success-200 rounded-3 text-center mb-0">
                            <h6 class="fw-bold mb-1"><i class="bi bi-info-circle-fill"></i> Hướng dẫn thanh toán & tích điểm</h6>
                            <p class="mb-0 small text-start text-md-center">Khách hàng quét mã VietQR bên trái để chuyển khoản thanh toán, sau đó mở ứng dụng Green Credit quét mã bên phải để tích lũy điểm thưởng sống xanh.</p>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="modal-footer p-4 border-0 bg-light d-flex justify-content-end gap-2">
                        <a href="{{ route('store.invoices.show', $invoice) }}" class="btn btn-outline-dark px-4 py-2 fw-bold rounded-3">
                            XEM CHI TIẾT HÓA ĐƠN
                        </a>
                        <button wire:click="resetInvoice" class="btn btn-emerald px-4 py-2 text-white fw-bold rounded-3" style="background-color: #047857; border-color: #047857;">
                            BÁN ĐƠN HÀNG MỚI <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
