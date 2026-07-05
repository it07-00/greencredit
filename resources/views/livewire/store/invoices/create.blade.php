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
                                <input wire:model.live="search" type="text" class="form-control ps-5 py-2 border-0 shadow-sm rounded-3" placeholder="Tìm sản phẩm...">
                                <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Danh sách thẻ sản phẩm -->
                    <div class="row g-4">
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
                                            <h6 class="fw-bold text-success mb-0">{{ number_format($product['price']) }}đ</h6>
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
                        <button wire:click="$set('payment_method', 'cash')" class="btn btn-sm flex-fill border py-2 rounded-3 {{ $payment_method === 'cash' ? 'bg-emerald-50 text-emerald-800 border-emerald-600 fw-semibold' : 'btn-light' }}">Tiền mặt</button>
                        <button wire:click="$set('payment_method', 'card')" class="btn btn-sm flex-fill border py-2 rounded-3 {{ $payment_method === 'card' ? 'bg-emerald-50 text-emerald-800 border-emerald-600 fw-semibold' : 'btn-light' }}">Thẻ ngân hàng</button>
                        <button wire:click="$set('payment_method', 'wallet')" class="btn btn-sm flex-fill border py-2 rounded-3 {{ $payment_method === 'wallet' ? 'bg-emerald-50 text-emerald-800 border-emerald-600 fw-semibold' : 'btn-light' }}">Ví điện tử</button>
                    </div>
                </div>
            </div>

            <!-- Danh sách vật phẩm trong giỏ -->
            <div class="p-4 flex-grow-1 overflow-y-auto" style="max-height: 35vh;">
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
                                        <div class="text-muted small">{{ number_format($item['price']) }}đ</div>
                                    </td>
                                    <td class="py-2 text-center">
                                        <div class="d-flex align-items-center justify-content-center gap-1 border rounded-3 p-1" style="background-color: #f8fafc;">
                                            <button wire:click="decrementQty({{ $key }})" class="btn btn-link btn-sm p-0 m-0 text-dark decoration-none" style="width: 20px;"><i class="bi bi-minus"></i></button>
                                            <span class="fw-semibold px-2 small">{{ $item['qty'] }}</span>
                                            <button wire:click="incrementQty({{ $key }})" class="btn btn-link btn-sm p-0 m-0 text-dark decoration-none" style="width: 20px;"><i class="bi bi-plus"></i></button>
                                        </div>
                                    </td>
                                    <td class="py-2 text-end">
                                        <div class="fw-bold text-dark">{{ number_format($item['price'] * $item['qty']) }}đ</div>
                                        <button wire:click="removeFromCart({{ $key }})" class="btn btn-link btn-sm p-0 text-danger" title="Xóa"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

            <!-- Hành động xanh (Green Actions) -->
            <div class="p-4 bg-light border-top border-bottom">
                <h6 class="fw-bold mb-3 text-emerald-800 d-flex align-items-center gap-2">
                    <i class="bi bi-leaf-fill"></i> Hành động xanh của khách
                </h6>
                <div class="row g-2">
                    @foreach ($rules as $rule)
                        @php
                            $isSelected = in_array($rule->code, $actions);
                        @endphp
                        <div class="col-6">
                            <label class="d-flex flex-column align-items-center justify-content-center p-2 rounded-3 border text-center cursor-pointer transition-all" 
                                   style="margin-bottom: 0px; min-height: 65px; border-color: {{ $isSelected ? '#10b981' : '#e2e8f0' }}; background-color: {{ $isSelected ? '#ecfdf5' : '#ffffff' }};">
                                <input type="checkbox" wire:model.live="actions" value="{{ $rule->code }}" class="d-none">
                                <div class="small fw-bold {{ $isSelected ? 'text-success' : 'text-dark' }}" style="font-size: 12px; line-height: 1.2;">{{ $rule->name }}</div>
                                <div class="text-success small mt-1" style="font-size: 10px; font-weight: 700;">+{{ $rule->points }} điểm</div>
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('actions') <p class="text-danger small mt-2 mb-0">{{ $message }}</p> @enderror
            </div>

            <!-- Tổng kết tiền & điểm -->
            <div class="p-4 bg-white border-top">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Tổng tiền hàng:</span>
                    <strong class="text-dark">{{ number_format($amount) }}đ</strong>
                </div>
                <div class="d-flex justify-content-between mb-3 text-success">
                    <span>Điểm xanh tích lũy dự kiến:</span>
                    <strong class="fw-bold">+{{ $calculated['points'] }}đ ({{ $calculated['plastic_saved_grams'] }}g nhựa, {{ $calculated['co2_saved_kg'] }}kg CO2)</strong>
                </div>

                <button wire:click="create" class="btn btn-emerald w-100 py-3 rounded-3 text-white fw-bold shadow d-flex align-items-center justify-content-center gap-2" style="background-color: #059669; border-color: #059669;">
                    <i class="bi bi-qr-code-scan"></i> THANH TOÁN & XUẤT QR CODE
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Kết Quả Hoá Đơn & Mã QR Tích Điểm -->
    @if ($invoice)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0, 0, 0, 0.6); z-index: 1050; backdrop-filter: blur(4px);">
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
                            <p class="text-muted mb-1">Mã hóa đơn</p>
                            <h4 class="fw-bold text-dark mb-0">{{ $invoice->invoice_code }}</h4>
                        </div>

                        <!-- Side by Side QR Codes -->
                        <div class="row g-4 justify-content-center mb-4">
                            <!-- VietQR Payment (Left) -->
                            <div class="col-md-6 text-center border-end">
                                <h6 class="fw-bold text-dark mb-3"><i class="bi bi-wallet2 text-primary"></i> 1. Quét Thanh Toán (VietQR)</h6>
                                <div class="mx-auto p-3 bg-light rounded-4 mb-2 d-flex flex-column align-items-center justify-content-center" style="max-width: 240px; border: 1px solid #e2e8f0;">
                                    <img src="https://img.vietqr.io/image/tcb-1006200076-compact.png?amount={{ $invoice->amount }}&addInfo=GC%20{{ $invoice->invoice_code }}&accountName=GREEN%20CREDIT%20STORE" alt="VietQR Payment" class="img-fluid rounded-2 shadow-sm" style="max-height: 180px;">
                                </div>
                                <p class="text-muted small mt-2">Ngân hàng: Techcombank<br>Số tiền: <strong>{{ number_format($invoice->amount) }}đ</strong></p>
                            </div>

                            <!-- Green Credit (Right) -->
                            <div class="col-md-6 text-center">
                                <h6 class="fw-bold text-success mb-3"><i class="bi bi-leaf-fill"></i> 2. Quét Nhận Điểm Xanh</h6>
                                <div class="mx-auto p-4 bg-dark rounded-4 mb-2 d-flex flex-column align-items-center justify-content-center" style="max-width: 240px; aspect-ratio: 1; background-color: #0f172a; height: 206px;">
                                    <span class="text-white small mb-2 tracking-widest fw-semibold" style="font-size: 10px;">QUÉT MÃ TÍCH ĐIỂM</span>
                                    <div class="p-2 bg-white rounded-3 shadow">
                                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=120x120&data={{ urlencode(route('user.scan-qr', ['token' => $invoice->qr_token])) }}" alt="QR Code" style="width: 120px; height: 120px;">
                                    </div>
                                    <span class="text-emerald-400 small mt-2 fw-bold" style="font-size: 10px;">GREEN CREDIT PLATFORM</span>
                                </div>
                                <p class="text-success small mt-2">Phần thưởng: <strong>+{{ $invoice->points_awarded }} Green Points</strong></p>
                            </div>
                        </div>

                        <div class="p-3 bg-success-subtle text-success border border-success-200 rounded-3 text-center mb-0">
                            <h6 class="fw-bold mb-1"><i class="bi bi-info-circle-fill"></i> Hướng dẫn thanh toán & tích điểm</h6>
                            <p class="mb-0 small text-start text-md-center">Khách hàng quét mã VietQR bên trái để chuyển khoản thanh toán, sau đó mở ứng dụng Green Credit quét mã bên phải để tích lũy điểm thưởng sống xanh.</p>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="modal-footer p-4 border-0 bg-light d-flex justify-content-end gap-2">
                        <button wire:click="resetInvoice" class="btn btn-emerald px-4 py-2 text-white fw-bold rounded-3" style="background-color: #047857; border-color: #047857;">
                            BÁN ĐƠN HÀNG MỚI <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
