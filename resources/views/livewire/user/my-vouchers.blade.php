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
                        <li>Voucher của tôi</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Voucher của tôi</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Stats Row -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px; transition: transform 0.2s;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fw-bold text-uppercase small" style="font-size: 11px; letter-spacing: 0.05em;">Tổng sở hữu</span>
                                <h3 class="fw-bold text-dark my-2" style="font-size: 28px;">{{ $stats['total'] }}</h3>
                                <span class="text-muted small">Số voucher đã đổi</span>
                            </div>
                            <div class="rounded-circle p-3 bg-primary-subtle text-primary" style="background-color: #eff6ff;">
                                <i class="fas fa-ticket-alt fs-3 text-primary" style="color: #3b82f6 !important;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px; transition: transform 0.2s;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fw-bold text-uppercase small" style="font-size: 11px; letter-spacing: 0.05em;">Chưa sử dụng</span>
                                <h3 class="fw-bold text-success my-2" style="font-size: 28px; color: #10b981 !important;">{{ $stats['active'] }}</h3>
                                <span class="text-muted small">Vẫn còn hiệu lực sử dụng</span>
                            </div>
                            <div class="rounded-circle p-3 bg-success-subtle text-success" style="background-color: #ecfdf5;">
                                <i class="fas fa-check-circle fs-3 text-success" style="color: #10b981 !important;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px; transition: transform 0.2s;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <span class="text-muted fw-bold text-uppercase small" style="font-size: 11px; letter-spacing: 0.05em;">Đã sử dụng</span>
                                <h3 class="fw-bold text-secondary my-2" style="font-size: 28px;">{{ $stats['used'] }}</h3>
                                <span class="text-muted small">Đã xác thực tại quầy</span>
                            </div>
                            <div class="rounded-circle p-3 bg-light text-secondary">
                                <i class="fas fa-history fs-3 text-secondary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters Section -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <div class="nav nav-pills gap-2 bg-white p-1.5 rounded-3 shadow-sm" style="padding: 6px; border-radius: 12px;">
                    <button wire:click="changeFilter('all')" class="nav-link px-4 py-2 border-0 rounded-2 fw-semibold @if($statusFilter === 'all') active text-white bg-success @else text-dark bg-transparent @endif" style="@if($statusFilter === 'all') background-color: #10b981 !important; @endif font-size: 14px;">
                        Tất cả
                    </button>
                    <button wire:click="changeFilter('active')" class="nav-link px-4 py-2 border-0 rounded-2 fw-semibold @if($statusFilter === 'active') active text-white bg-success @else text-dark bg-transparent @endif" style="@if($statusFilter === 'active') background-color: #10b981 !important; @endif font-size: 14px;">
                        Chưa sử dụng
                    </button>
                    <button wire:click="changeFilter('used')" class="nav-link px-4 py-2 border-0 rounded-2 fw-semibold @if($statusFilter === 'used') active text-white bg-success @else text-dark bg-transparent @endif" style="@if($statusFilter === 'used') background-color: #10b981 !important; @endif font-size: 14px;">
                        Đã sử dụng
                    </button>
                    <button wire:click="changeFilter('expired')" class="nav-link px-4 py-2 border-0 rounded-2 fw-semibold @if($statusFilter === 'expired') active text-white bg-success @else text-dark bg-transparent @endif" style="@if($statusFilter === 'expired') background-color: #10b981 !important; @endif font-size: 14px;">
                        Hết hạn
                    </button>
                </div>
                
                <a href="{{ route('user.vouchers') }}" class="theme-btn px-4 py-2.5 border-0 text-white rounded-3 shadow-sm" style="border-radius: 10px; display: inline-flex; align-items: center; gap: 8px;">
                    <i class="far fa-gift"></i> Đổi thêm voucher
                </a>
            </div>

            <!-- Voucher Cards Grid -->
            <div class="row g-4">
                @forelse($redemptions as $r)
                    <div class="col-lg-6 col-xl-4">
                        <!-- Premium Ticket Card -->
                        <div class="card border-0 shadow-sm overflow-hidden h-100 bg-white" style="border-radius: 16px; min-height: 200px; display: flex; flex-direction: row; position: relative;">
                            
                            <!-- Left: Branding & Category Icon -->
                            <div class="d-flex flex-column align-items-center justify-content-center text-center p-3 text-white" 
                                 style="width: 32%; background: linear-gradient(135deg, @if($r->status === 'issued') #10b981 0%, #047857 100% @else #9ca3af 0%, #6b7280 100% @endif); position: relative;">
                                
                                <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px; background-color: rgba(255, 255, 255, 0.2);">
                                    @php
                                        $category = $r->voucher->category ?? 'coffee';
                                        $icon = 'fa-tag';
                                        if ($category === 'coffee' || $category === 'milktea') $icon = 'fa-coffee';
                                        elseif ($category === 'supermarket') $icon = 'fa-shopping-basket';
                                        elseif ($category === 'finance') $icon = 'fa-wallet';
                                    @endphp
                                    <i class="fas {{ $icon }} fs-4 text-white"></i>
                                </div>
                                <span class="fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.1em;">
                                    {{ $r->voucher->category === 'finance' ? 'Tài chính' : ($r->voucher->category === 'supermarket' ? 'Siêu thị' : 'Ăn uống') }}
                                </span>
                                <div class="text-white-50 mt-1 small" style="font-size: 10px;">
                                    {{ number_format($r->points_spent) }} P
                                </div>
                            </div>

                            <!-- Separation dashed line and ticket cutouts -->
                            <div style="position: absolute; left: 32%; top: 0; bottom: 0; width: 0; border-left: 2px dashed #e5e7eb; z-index: 10;">
                                <!-- Top Cutout -->
                                <div style="position: absolute; top: -10px; left: -10px; width: 20px; height: 20px; border-radius: 50%; background-color: #f8fafc; border: 1px solid #e5e7eb; z-index: 20;"></div>
                                <!-- Bottom Cutout -->
                                <div style="position: absolute; bottom: -10px; left: -10px; width: 20px; height: 20px; border-radius: 50%; background-color: #f8fafc; border: 1px solid #e5e7eb; z-index: 20;"></div>
                            </div>

                            <!-- Right: Content details -->
                            <div class="p-3.5 d-flex flex-column justify-content-between" style="width: 68%; padding: 16px 16px 16px 24px; position: relative;">
                                <div>
                                    <!-- Status Badge -->
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small" style="font-size: 11px;">Hạn dùng: {{ $r->expired_at?->format('d/m/Y') ?? 'Vô thời hạn' }}</span>
                                        @if($r->status === 'issued')
                                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-2 py-0.5" style="font-size: 10px;">Chưa dùng</span>
                                        @elseif($r->status === 'used')
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2 py-0.5" style="font-size: 10px;">Đã dùng</span>
                                        @elseif($r->status === 'expired')
                                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2 py-0.5" style="font-size: 10px;">Hết hạn</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-2 py-0.5" style="font-size: 10px;">{{ $r->status }}</span>
                                        @endif
                                    </div>

                                    <!-- Title and discount value -->
                                    <h6 class="fw-bold text-dark mb-1 text-truncate" title="{{ $r->voucher->title }}">{{ $r->voucher->title }}</h6>
                                    <p class="text-success small fw-semibold mb-2" style="font-size: 12px;">
                                        Trị giá: 
                                        @if($r->voucher->discount_type === 'percent')
                                            Giảm {{ (int) $r->voucher->discount_value }}%
                                        @else
                                            {{ number_format($r->voucher->discount_value, 0, ',', '.') }} VNĐ
                                        @endif
                                    </p>
                                    
                                    <!-- Store/Partner context -->
                                    <span class="text-muted d-block small mb-3" style="font-size: 11px;">
                                        <i class="fas fa-store me-1"></i> {{ $r->voucher->store->name ?? ($r->voucher->partner->name ?? 'Mạng lưới Đối tác') }}
                                    </span>
                                </div>

                                <!-- Redemption Code Action Box -->
                                <div class="bg-light p-2 rounded-3 d-flex align-items-center justify-content-between border" style="background-color: #f8fafc; border-color: #f1f5f9 !important;">
                                    <span class="fw-bold font-monospace text-primary text-truncate me-2" style="font-size: 12px; letter-spacing: 0.5px;">{{ $r->redemption_code }}</span>
                                    <button onclick="copyMyVoucher('{{ $r->redemption_code }}', this)" class="btn btn-sm btn-outline-success border-0 bg-transparent text-emerald-600 p-1" style="font-size: 12px; color: #10b981 !important;" title="Sao chép mã">
                                        <i class="fas fa-copy"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <span style="font-size: 64px;">🎟️</span>
                        <h4 class="fw-bold text-dark mt-3 mb-2">Chưa có voucher nào</h4>
                        <p class="text-muted small mb-4">Bạn chưa sở hữu voucher thuộc danh mục bộ lọc này.</p>
                        <a href="{{ route('user.vouchers') }}" class="theme-btn px-4 py-2 border-0 text-white rounded-3">
                            <i class="fas fa-gift me-1"></i> Khám phá voucher ngay
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-5">
                {{ $redemptions->links() }}
            </div>
        </div>
    </section>

    <!-- Copy Helper Script -->
    @push('scripts')
    <script>
        function copyMyVoucher(code, btn) {
            navigator.clipboard.writeText(code).then(() => {
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="far fa-check text-success"></i>';
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Đã sao chép mã voucher!',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'rounded-3'
                    }
                });
                setTimeout(() => {
                    btn.innerHTML = originalHtml;
                }, 1500);
            });
        }
    </script>
    @endpush
</div>
