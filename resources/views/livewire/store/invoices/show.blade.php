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
                        <li>
                            <a href="{{ route('store.invoices') }}">Hóa đơn xanh</a>
                        </li>
                        <li>
                            <i class="far fa-angle-right"></i>
                        </li>
                        <li>Chi tiết hóa đơn</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Chi tiết hóa đơn</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Start -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container" style="max-width: 800px;">
            <div class="mb-4">
                <a href="{{ route('store.invoices') }}" class="text-success fw-bold text-decoration-none"><i class="far fa-arrow-left me-1"></i> Quay lại danh sách hóa đơn</a>
            </div>
            
            <div class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <span class="badge {{ $invoice->status === 'used' ? 'bg-success-subtle text-success border border-success-subtle' : 'bg-warning-subtle text-warning border border-warning-subtle' }} px-3 py-2 rounded-pill fw-bold" style="font-size: 12px;">
                            {{ $invoice->status === 'used' ? 'Đã quét' : 'Chờ quét' }}
                        </span>
                        <h3 class="fw-bold text-dark mt-2 mb-0" style="font-size: 26px;">{{ $invoice->invoice_code }}</h3>
                    </div>
                    <div class="text-end">
                        <p class="text-muted small mb-0">Cửa hàng: <strong>{{ $invoice->store->name }}</strong></p>
                        <p class="text-muted small mb-0">Thời gian tạo: {{ $invoice->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <div class="card border p-3 rounded-4 bg-light text-center" style="border-radius: 15px;">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Điểm phát hành</span>
                            <h3 class="fw-bold text-success mb-0">{{ number_format($invoice->base_points) }}</h3>
                            <span class="text-muted small">Green Points</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border p-3 rounded-4 bg-light text-center" style="border-radius: 15px;">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">Nhựa giảm thiểu</span>
                            <h3 class="fw-bold text-primary mb-0">{{ number_format($invoice->plastic_saved_grams) }}g</h3>
                            <span class="text-muted small">Trọng lượng nhựa</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border p-3 rounded-4 bg-light text-center" style="border-radius: 15px;">
                            <span class="text-muted small fw-bold text-uppercase d-block mb-1">CO₂ giảm phát</span>
                            <h3 class="fw-bold text-info mb-0">{{ number_format($invoice->co2_saved_kg, 2) }}kg</h3>
                            <span class="text-muted small">Trọng lượng CO₂</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-4 p-4 text-center text-white" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border-radius: 20px;">
                    <div class="p-3 bg-white d-inline-block rounded-4 mb-3">
                        <img src="https://api.qrserver.com/v1/create-qr-code/?size=160x160&data=GREEN-CREDIT:{{ $invoice->qr_token }}" alt="QR Code" class="img-fluid" style="width: 160px; height: 160px; object-fit: contain;">
                    </div>
                    <p class="text-white-50 small mb-1">Mã Token QR hóa đơn (Demo)</p>
                    <p class="break-all font-monospace fw-bold mb-0 text-white" style="font-size: 14px;">{{ $invoice->qr_token }}</p>
                </div>
            </div>
        </div>
    </section>
</div>
