<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Green Wallet</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Ví Điểm Xanh (Green Wallet)</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- 4 Thống kê ví -->
            <div class="row g-4 mb-4">
                <!-- Số dư -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Số dư khả dụng</span>
                        <h2 class="fw-bold text-success my-2" style="font-size: 32px; font-weight: 800;">{{ number_format($wallet->current_balance) }}</h2>
                        <span class="text-muted small">Green Points</span>
                    </div>
                </div>

                <!-- Tổng đã kiếm -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Tổng điểm đã tích</span>
                        <h2 class="fw-bold text-dark my-2" style="font-size: 32px; font-weight: 800;">{{ number_format($wallet->total_earned) }}</h2>
                        <span class="text-success small fw-semibold"><i class="far fa-arrow-up"></i> Tích lũy trọn đời</span>
                    </div>
                </div>

                <!-- Tổng đã đổi -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Tổng điểm đã đổi</span>
                        <h2 class="fw-bold text-danger my-2" style="font-size: 32px; font-weight: 800;">{{ number_format($wallet->total_redeemed) }}</h2>
                        <span class="text-danger small fw-semibold"><i class="far fa-arrow-down"></i> Quy đổi voucher</span>
                    </div>
                </div>

                <!-- Quy đổi mô phỏng -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Quy đổi ước tính</span>
                        <h2 class="fw-bold text-info my-2" style="font-size: 32px; font-weight: 800;">{{ number_format($wallet->current_balance * 10) }}đ</h2>
                        <span class="text-muted small">Tỷ lệ: 100 điểm = 1.000đ</span>
                    </div>
                </div>
            </div>

            <!-- Lịch sử giao dịch chi tiết (Ledger) -->
            <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 20px;">
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                    <div>
                        <h5 class="fw-bold text-dark mb-0">Lịch sử biến động số dư</h5>
                        <span class="text-muted small">Chi tiết các lần cộng/trừ điểm thưởng của ví</span>
                    </div>
                    <div class="d-flex gap-2">
                        <select wire:model.live="type" class="form-select rounded-3 border-light shadow-sm" style="border: 1.5px solid #e2e8f0; font-size: 14px; width: 140px; border-radius: 10px;">
                            <option value="">Tất cả</option>
                            <option value="earn">Tích điểm (+)</option>
                            <option value="redeem">Đổi điểm (-)</option>
                            <option value="refund">Hoàn điểm</option>
                            <option value="penalty">Phạt điểm</option>
                        </select>
                        <a href="{{ route('user.vouchers') }}" class="theme-btn py-2 px-3 text-white" style="font-size: 13px; line-height: 2;">
                            Đổi voucher <i class="far fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <div class="list-group list-group-flush">
                    @forelse ($ledger as $point)
                        <div class="list-group-item d-flex align-items-center justify-content-between border-0 px-0 py-3 border-bottom border-dashed" style="border-bottom-style: dashed !important;">
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 d-flex align-items-center justify-content-center {{ $point->points > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}" style="width: 42px; height: 42px; background: {{ $point->points > 0 ? '#ecfdf5' : '#fef2f2' }}; color: {{ $point->points > 0 ? '#10b981' : '#ef4444' }};">
                                    <i class="far {{ $point->points > 0 ? 'fa-arrow-up' : 'fa-arrow-down' }} fs-5"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-dark mb-0">{{ $point->description }}</h6>
                                    <span class="text-muted small">{{ $point->created_at->format('d/m/Y H:i:s') }}</span>
                                </div>
                            </div>
                            <div class="text-end">
                                <h5 class="fw-bold mb-0 {{ $point->points > 0 ? 'text-success' : 'text-danger' }}" style="color: {{ $point->points > 0 ? '#15803d' : '#dc2626' }}; font-weight: 800;">
                                    {{ $point->points > 0 ? '+' : '' }}{{ number_format($point->points) }}
                                </h5>
                                <span class="text-muted small" style="font-size: 11px;">điểm</span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <span class="fs-1 text-success"><i class="far fa-wallet"></i></span>
                            <h5 class="fw-bold text-dark mt-3 mb-2">Chưa có lịch sử ví</h5>
                            <p class="text-muted small">Mọi giao dịch cộng điểm hay quy đổi quà tặng của ví sẽ xuất hiện tại đây.</p>
                        </div>
                    @endforelse
                </div>

                <div class="mt-4 d-flex justify-content-center">
                    {{ $ledger->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
