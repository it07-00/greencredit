<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Net Zero Planner</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Kế hoạch Net Zero (Net Zero Planner)</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- 4 Thống kê mục tiêu -->
            <div class="row g-4 mb-4">
                <!-- plastic -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Mục tiêu giảm nhựa</span>
                        <h2 class="fw-bold text-success my-2" style="font-size: 32px; font-weight: 800;">{{ number_format($goal->plastic_target_grams) }}g</h2>
                        <span class="text-muted small">Nhựa tránh thải hàng tháng</span>
                    </div>
                </div>

                <!-- co2 -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Mục tiêu giảm CO₂</span>
                        <h2 class="fw-bold text-dark my-2" style="font-size: 32px; font-weight: 800;">{{ number_format($goal->co2_target_kg, 1) }}kg</h2>
                        <span class="text-success small fw-semibold">Phát thải giảm thiểu</span>
                    </div>
                </div>

                <!-- points -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Mục tiêu điểm thưởng</span>
                        <h2 class="fw-bold text-success my-2" style="font-size: 32px; font-weight: 800;">+{{ number_format($goal->points_target) }}</h2>
                        <span class="text-muted small">Green Points cần tích</span>
                    </div>
                </div>

                <!-- action -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Số hành động xanh</span>
                        <h2 class="fw-bold text-info my-2" style="font-size: 32px; font-weight: 800;">{{ $goal->action_target }} lần</h2>
                        <span class="text-muted small">Hành động bảo vệ môi trường</span>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Left: AI Recommendations -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4 bg-white h-100" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-4"><i class="far fa-robot text-success me-2"></i>Đề xuất hành động xanh (AI gợi ý)</h5>
                        
                        <div class="d-flex flex-column gap-3">
                            @forelse ($recommendations as $item)
                                <div class="p-3 rounded-3 border bg-light">
                                    <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                                        <h6 class="fw-bold mb-0 text-dark" style="font-size: 14px;">{{ $item->title }}</h6>
                                        <span class="badge bg-success text-white text-uppercase" style="font-size: 10px; background-color: #15803d !important;">{{ $item->status }}</span>
                                    </div>
                                    <p class="text-muted small mb-3" style="line-height: 1.4;">{{ $item->description }}</p>
                                    @if ($item->status !== 'applied')
                                        <button wire:click="apply({{ $item->id }})" class="btn btn-sm btn-success rounded-pill px-3 fw-bold" style="font-size: 12px; background-color: #15803d; border-color: #15803d;">
                                            Áp dụng đề xuất
                                        </button>
                                    @else
                                        <span class="text-success small fw-bold"><i class="far fa-check me-1"></i> Đã áp dụng</span>
                                    @endif
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <span class="fs-1 text-warning"><i class="far fa-lightbulb"></i></span>
                                    <p class="text-muted small mt-2">Chưa có đề xuất hành động xanh nào.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right: Roadmap -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4 bg-white h-100" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-4"><i class="far fa-map-signs text-success me-2"></i>Lộ trình đạt Net Zero cá nhân</h5>
                        
                        <div class="d-flex flex-column gap-3">
                            @foreach ([['1. Nhận thức','Bắt đầu theo dõi và đo lường dấu chân carbon cá nhân hàng ngày.'],['2. Tiết giảm','Cắt giảm sử dụng các sản phẩm nhựa dùng một lần và hạn chế rác thải.'],['3. Tối ưu','Tối ưu hóa các phương tiện di chuyển sang xe điện hoặc xe đạp và tiết kiệm điện.'],['4. Bù đắp','Tích cực tham gia các chương trình trồng cây xanh để bù đắp lượng khí thải.'],['5. Net Zero','Duy trì thói quen sống bền vững hướng tới không phát thải carbon ròng.']] as $step)
                                <div class="d-flex gap-3 p-3 rounded-3 align-items-start" style="background-color: #f0fdf4;">
                                    <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center fw-bold" style="width: 32px; height: 32px; flex-shrink: 0; font-size: 14px; background-color: #15803d !important;">
                                        {{ $loop->iteration }}
                                    </div>
                                    <div>
                                        <h6 class="fw-bold text-dark mb-1" style="font-size: 14px;">{{ $step[0] }}</h6>
                                        <p class="text-muted small mb-0" style="line-height: 1.4;">{{ $step[1] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
