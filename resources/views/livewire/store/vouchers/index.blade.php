<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <i class="far fa-angle-right"></i>
                        </li>
                        <li>Đổi Voucher</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Đổi Voucher cho khách hàng</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Start -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Store info -->
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #059669 0%, #064e3b 100%); color: #fff; border-radius: 20px;">
                <div class="d-flex align-items-center">
                    <div>
                        <span class="badge bg-white text-emerald-800 px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 13px;">
                            <i class="far fa-store me-1"></i> Cửa hàng: {{ $this->store->name }}
                        </span>
                        <h3 class="fw-bold mb-2 text-white" style="font-size: 24px;">Xác thực & áp dụng Voucher</h3>
                        <p class="mb-0 text-white-50">Khi khách hàng xuất trình mã voucher đổi thưởng (dạng VC-XXXXXXXXXX), nhập mã dưới đây để kiểm tra và áp dụng ưu đãi.</p>
                    </div>
                </div>
            </div>

            <!-- Notifications -->
            @if($success)
                <div class="alert alert-success border-0 shadow-sm mb-4 rounded-4" style="border-radius: 15px;">
                    <i class="far fa-check-circle me-2 fs-5"></i> <strong>Thành công!</strong> {{ $success }}
                </div>
            @endif

            @if($error)
                <div class="alert alert-danger border-0 shadow-sm mb-4 rounded-4" style="border-radius: 15px;">
                    <i class="far fa-exclamation-circle me-2 fs-5"></i> <strong>Lỗi!</strong> {{ $error }}
                </div>
            @endif

            <div class="row g-4">
                <!-- Check Voucher Input Form (Left) -->
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                        <h4 class="fw-bold text-dark mb-3"><i class="far fa-ticket-alt text-success me-2"></i>Kiểm tra mã Voucher</h4>
                        
                        <form wire:submit.prevent="checkCode">
                            <div class="mb-3">
                                <label class="form-label small fw-semibold text-muted">Nhập mã đổi thưởng (Redeem Code)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0"><i class="far fa-search text-muted"></i></span>
                                    <input wire:model.defer="code" type="text" class="form-control border-start-0 py-2" placeholder="Ví dụ: VC-A1B2C3D4E5" style="text-transform: uppercase;">
                                </div>
                                @error('code') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                            <button type="submit" class="theme-btn px-4 py-2 border-0 w-100 text-center justify-content-center">
                                <i class="far fa-search me-1"></i> KIỂM TRA MÃ
                            </button>
                        </form>

                        <!-- Display Voucher Details when Checked -->
                        @if($redemption)
                            <div class="mt-4 pt-4 border-top">
                                <h5 class="fw-bold text-dark mb-3">Chi tiết Voucher</h5>
                                <div class="p-3 bg-light rounded-3 mb-3 border border-success-subtle">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Mã:</span>
                                        <strong class="text-primary">{{ $redemption->redemption_code }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Tên Voucher:</span>
                                        <strong class="text-dark text-end" style="max-width: 70%;">{{ $redemption->voucher->title }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Khách hàng:</span>
                                        <strong class="text-dark">{{ $redemption->user->name }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span class="text-muted small">Trạng thái:</span>
                                        @if($redemption->status === 'issued')
                                            <span class="badge bg-warning text-dark">Chưa sử dụng (Hợp lệ)</span>
                                        @elseif($redemption->status === 'used')
                                            <span class="badge bg-success text-white">Đã sử dụng vào {{ $redemption->used_at?->format('d/m/Y H:i') }}</span>
                                        @elseif($redemption->status === 'expired')
                                            <span class="badge bg-danger text-white">Đã hết hạn</span>
                                        @else
                                            <span class="badge bg-secondary text-white">{{ $redemption->status }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted small">Hạn sử dụng mã:</span>
                                        <strong class="text-dark">{{ $redemption->expired_at?->format('d/m/Y') ?? 'Vô thời hạn' }}</strong>
                                    </div>
                                </div>

                                @if($redemption->status === 'issued')
                                    <button wire:click="confirmUse" class="btn btn-success w-100 py-2 rounded-3 text-white fw-bold d-flex align-items-center justify-content-center gap-2" style="background-color: #059669; border-color: #059669;">
                                        <i class="far fa-check-circle"></i> XÁC NHẬN SỬ DỤNG VOUCHER
                                    </button>
                                @else
                                    <div class="alert alert-warning p-2 rounded-3 small mb-0 text-center">
                                        <i class="far fa-exclamation-triangle me-1"></i> Không thể sử dụng mã voucher này.
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Redemptions History Table (Right) -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                        <h4 class="fw-bold text-dark mb-4"><i class="far fa-history text-success me-2"></i>Lịch sử đổi Voucher tại cửa hàng</h4>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã Voucher</th>
                                        <th>Voucher</th>
                                        <th>Khách hàng</th>
                                        <th>Trạng thái</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($redemptions as $r)
                                        <tr>
                                            <td><strong class="text-primary">{{ $r->redemption_code }}</strong></td>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $r->voucher->title }}</div>
                                                <div class="text-muted small" style="font-size: 11px;">
                                                    Trị giá: 
                                                    @if($r->voucher->discount_type === 'percent')
                                                        Giảm {{ (int) $r->voucher->discount_value }}%
                                                    @else
                                                        {{ number_format($r->voucher->discount_value, 0, ',', '.') }} VNĐ
                                                    @endif
                                                </div>
                                            </td>
                                            <td>
                                                <div class="fw-semibold text-dark">{{ $r->user->name }}</div>
                                                <div class="text-muted small" style="font-size: 11px;">{{ $r->user->email }}</div>
                                            </td>
                                            <td>
                                                @if($r->status === 'issued')
                                                    <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-2 py-1">Chưa sử dụng</span>
                                                @elseif($r->status === 'used')
                                                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-1">Đã dùng</span>
                                                @elseif($r->status === 'expired')
                                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2 py-1">Hết hạn</span>
                                                @else
                                                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2 py-1">{{ $r->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($r->status === 'used' && $r->used_at)
                                                    <div class="text-dark small fw-semibold">{{ $r->used_at->format('d/m/Y H:i') }}</div>
                                                    <div class="text-muted" style="font-size: 10px;">Sử dụng</div>
                                                @else
                                                    <div class="text-dark small">{{ $r->created_at->format('d/m/Y H:i') }}</div>
                                                    <div class="text-muted" style="font-size: 10px;">Đổi lúc</div>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">Chưa có lượt đổi voucher nào tại cửa hàng của bạn.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $redemptions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
