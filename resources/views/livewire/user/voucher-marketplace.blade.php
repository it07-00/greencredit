<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Đổi voucher</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Cửa hàng đổi điểm (Voucher Marketplace)</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            @if ($message)
                <div class="alert alert-info rounded-3 mb-4 p-3 shadow-sm">
                    <i class="far fa-info-circle me-2"></i>{{ $message }}
                </div>
            @endif

            <!-- Search and Filter Bar -->
            <div class="card border-0 shadow-sm p-3 mb-4 bg-white" style="border-radius: 15px;">
                <div class="row g-2 align-items-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="input-group">
                            <span class="input-group-text bg-light border-light text-muted" style="border-radius: 10px 0 0 10px;"><i class="far fa-search"></i></span>
                            <input wire:model.live="search" type="text" class="form-control bg-light border-light" placeholder="Tìm kiếm voucher..." style="font-size: 14px; border-radius: 0 10px 10px 0;">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <select wire:model.live="category" class="form-select bg-light border-light text-muted" style="font-size: 14px; border-radius: 10px;">
                            <option value="">Tất cả danh mục</option>
                            <option value="cafe">Cà phê / Đồ uống</option>
                            <option value="supermarket">Siêu thị / Mua sắm</option>
                            <option value="wallet">Ví điện tử / Nạp tiền</option>
                            <option value="finance">Tài chính xanh</option>
                        </select>
                    </div>
                    <div class="col text-md-end mt-2 mt-md-0">
                        <a href="{{ route('user.my-vouchers') }}" class="theme-btn py-2 px-3 text-white" style="font-size: 13px; line-height: 2;">
                            Voucher của tôi <i class="far fa-ticket-alt ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Vouchers Grid -->
            <div class="row g-4">
                @forelse ($vouchers as $voucher)
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm h-100 bg-white" style="border-radius: 20px; overflow: hidden; transition: transform 0.2s;">
                            @if ($voucher->image)
                                <div style="height: 180px; overflow: hidden;">
                                    <img src="{{ asset($voucher->image) }}" class="w-100 h-100" style="object-fit: cover;" alt="{{ $voucher->title }}">
                                </div>
                            @endif
                            <!-- Header status -->
                            <div class="p-3 text-success fw-bold d-flex justify-content-between align-items-center" style="background-color: #ecfdf5; font-size: 12px;">
                                <span class="text-uppercase"><i class="far fa-tag me-1"></i>{{ $voucher->category }}</span>
                                <span class="badge bg-success text-white px-2 py-1 rounded" style="background-color: #15803d !important;">
                                    {{ number_format($voucher->required_points) }} điểm
                                </span>
                            </div>
                            
                            <!-- Body content -->
                            <div class="card-body p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="fw-bold text-dark mb-2" style="font-size: 18px;">{{ $voucher->title }}</h5>
                                    <p class="text-muted small mb-4" style="line-height: 1.5; height: 45px; overflow: hidden;">{{ $voucher->description }}</p>
                                    
                                    <div class="row g-2 text-center bg-light rounded-3 p-3 mb-4">
                                        <div class="col-6 border-end" style="border-right: 1px solid #dee2e6 !important;">
                                            <span class="text-muted d-block small" style="font-size: 11px;">Mức giảm</span>
                                            <strong class="text-success" style="font-size: 15px;">
                                                @if($voucher->discount_type === 'percent')
                                                    {{ (int) $voucher->discount_value }}%
                                                @else
                                                    {{ number_format($voucher->discount_value, 0, ',', '.') }} VNĐ
                                                @endif
                                            </strong>
                                        </div>
                                        <div class="col-6">
                                            <span class="text-muted d-block small" style="font-size: 11px;">Yêu cầu Score</span>
                                            <strong class="text-dark" style="font-size: 15px;">{{ $voucher->min_green_score }}</strong>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-between align-items-center text-muted small px-1 mb-2" style="font-size: 12px;">
                                        <span>Trạng thái kho:</span>
                                        <strong class="text-dark">
                                            {{ $voucher->quantity ? ($voucher->quantity - $voucher->used_quantity) . ' còn lại' : 'Không giới hạn' }}
                                        </strong>
                                    </div>
                                </div>
                                
                                <button wire:click="redeem({{ $voucher->id }})" class="btn btn-success w-100 py-3 mt-3 fw-bold" style="background-color: #15803d; border-color: #15803d; border-radius: 10px;">
                                    Đổi ngay <i class="far fa-chevron-right ms-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <span style="font-size: 48px;">🎁</span>
                        <h5 class="fw-bold text-dark mt-3 mb-2">Không tìm thấy voucher nào</h5>
                        <p class="text-muted small">Hãy thử tìm kiếm với từ khóa hoặc danh mục khác.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function copyVoucherCode(code, btn) {
            navigator.clipboard.writeText(code).then(() => {
                btn.innerHTML = '<i class="far fa-check-circle me-1"></i> Đã chép';
                btn.style.backgroundColor = '#059669';
                btn.style.borderColor = '#059669';
                btn.style.color = '#ffffff';
                setTimeout(() => {
                    btn.innerHTML = '<i class="far fa-copy me-1"></i> Sao chép';
                    btn.style.backgroundColor = 'transparent';
                    btn.style.borderColor = '#10b981';
                    btn.style.color = '#10b981';
                }, 2000);
            });
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (window.Livewire) {
                Livewire.on('swal', (event) => {
                    const data = event[0] || event;
                    Swal.fire({
                        icon: data.type,
                        title: data.title,
                        text: data.text || '',
                        html: data.html || '',
                        confirmButtonText: 'Đồng ý',
                        confirmButtonColor: '#10b981',
                        customClass: {
                            popup: 'rounded-4'
                        }
                    });
                });
            }
        });
    </script>
    @endpush
</div>
