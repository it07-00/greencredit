<div>
    @php
        $user    = auth()->user();
        $balance = $wallet->current_balance ?? 0;
        $plastic = $plastic ?? 0;
        $co2     = $co2 ?? 0;
        $levelLabel = $level['label'] ?? 'Mầm Xanh';
        $levelColor = $level['color'] ?? '#6b7280';
        $levelNext  = $level['next'] ?? 200;
        $progressPct = $levelNext ? min(100, round(($score / $levelNext) * 100)) : 100;
    @endphp

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
                        <li>Trang cá nhân</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Xin chào, {{ $user->name }}!</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Content Start -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Level and Point Box -->
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); color: #fff; border-radius: 20px;">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 13px;"><i class="far fa-seedling me-1"></i> Cấp độ: {{ $levelLabel }}</span>
                        <h3 class="fw-bold mb-2 text-white text-3xl">Hành trình sống xanh của bạn</h3>
                        <p class="mb-0 text-white-50">Email: {{ $user->email }} | Chuỗi tích điểm: <strong>{{ $streakDays }} ngày liên tiếp</strong></p>
                        
                        <!-- Progress bar -->
                        <div class="mt-4">
                            <div class="d-flex justify-content-between mb-2 text-white fw-semibold" style="font-size: 13px;">
                                <span>Tiến trình cấp độ</span>
                                <span>{{ $score }}{{ $levelNext ? ' / ' . $levelNext . ' điểm' : ' (Cấp tối đa)' }}</span>
                            </div>
                            <div class="progress" style="height: 10px; border-radius: 999px; background: rgba(255, 255, 255, 0.2);">
                                <div class="progress-bar bg-white" role="progressbar" style="width: {{ $progressPct }}%; border-radius: 999px;" aria-valuenow="{{ $progressPct }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            @if ($levelNext)
                                <div class="text-end text-white-50 mt-2 small" style="font-size: 11px;">Còn {{ number_format($levelNext - $score) }} điểm để lên cấp tiếp theo</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-4 text-center mt-4 mt-md-0">
                        <div class="p-4 rounded-4 text-white" style="background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 20px;">
                            <span class="text-white-50 text-uppercase fw-bold tracking-wider" style="font-size: 11px;">Green Points</span>
                            <h1 class="fw-black text-white display-4 my-2" style="font-size: 48px; font-weight: 900;">{{ number_format($balance) }}</h1>
                            <p class="text-emerald-300 small mb-3">Điểm xanh khả dụng</p>
                            <a href="{{ route('user.wallet') }}" class="btn btn-sm btn-light text-success fw-bold px-4 py-2 rounded-pill shadow-sm" style="font-size: 12px;">
                                <i class="far fa-wallet me-1"></i> Xem ví điểm
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Grid -->
            <div class="row g-4 mb-4">
                <!-- Green Score -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Green Score</span>
                            <div class="p-2 rounded-3 text-success d-flex align-items-center justify-content-center" style="background: #ecfdf5; width: 38px; height: 38px;">
                                <i class="far fa-leaf fs-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-dark mb-1" style="font-size: 32px; font-weight: 800;">{{ number_format($score) }}</h2>
                        <p class="text-success small mb-0 fw-semibold"><i class="far fa-chevron-up me-1"></i> {{ $levelLabel }}</p>
                    </div>
                </div>

                <!-- Plastic Saved -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Nhựa đã giảm</span>
                            <div class="p-2 rounded-3 text-primary d-flex align-items-center justify-content-center" style="background: #eff6ff; width: 38px; height: 38px;">
                                <i class="far fa-recycle fs-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-dark mb-1" style="font-size: 32px; font-weight: 800;">{{ number_format($plastic / 1000, 2) }}</h2>
                        <p class="text-primary small mb-0 fw-semibold">kg nhựa tránh được</p>
                    </div>
                </div>

                <!-- CO2 Saved -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">CO₂ đã giảm</span>
                            <div class="p-2 rounded-3 text-info d-flex align-items-center justify-content-center" style="background: #ecfeff; width: 38px; height: 38px;">
                                <i class="far fa-cloud-share fs-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-dark mb-1" style="font-size: 32px; font-weight: 800;">{{ number_format($co2, 2) }}</h2>
                        <p class="text-info small mb-0 fw-semibold">kg CO₂ phát thải giảm</p>
                    </div>
                </div>

                <!-- Streak -->
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0 shadow-sm p-4 h-100 bg-white" style="border-radius: 20px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted fw-bold text-uppercase" style="font-size: 11px; letter-spacing: 0.05em;">Chuỗi xanh</span>
                            <div class="p-2 rounded-3 text-warning d-flex align-items-center justify-content-center" style="background: #fff7ed; width: 38px; height: 38px;">
                                <i class="far fa-fire fs-5"></i>
                            </div>
                        </div>
                        <h2 class="fw-bold text-dark mb-1" style="font-size: 32px; font-weight: 800;">{{ $streakDays }}</h2>
                        <p class="text-warning small mb-0 fw-semibold">ngày hành động liên tiếp</p>
                    </div>
                </div>
            </div>

            <!-- Detail Sections Grid -->
            <div class="row g-4">
                <!-- Left Section: Chart & History -->
                <div class="col-lg-8">
                    <!-- Points Graph Card -->
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white" style="border-radius: 20px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="fw-bold text-dark mb-0">Green Points tích lũy</h5>
                                <span class="text-muted small">Thống kê điểm xanh nhận được trong 6 tháng gần nhất</span>
                            </div>
                            <a href="{{ route('user.transactions') }}" class="text-success fw-bold small text-decoration-none hover-underline">
                                Xem lịch sử <i class="far fa-chevron-right ms-1"></i>
                            </a>
                        </div>
                        <div style="position: relative; height: 300px; width: 100%;">
                            <canvas id="userPointsChart"></canvas>
                        </div>
                    </div>

                    <!-- Transaction List Card -->
                    <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 20px;">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="fw-bold text-dark mb-0">Lịch sử giao dịch gần đây</h5>
                            <a href="{{ route('user.transactions') }}" class="text-success fw-bold small text-decoration-none hover-underline">
                                Xem tất cả <i class="far fa-chevron-right ms-1"></i>
                            </a>
                        </div>
                        <div class="list-group list-group-flush">
                            @forelse ($transactions as $tx)
                                <div class="list-group-item d-flex align-items-center justify-content-between border-0 px-0 py-3 border-bottom border-dashed" style="border-bottom-style: dashed !important;">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-3 d-flex align-items-center justify-content-center {{ $tx->points > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}" style="width: 42px; height: 42px; background: {{ $tx->points > 0 ? '#ecfdf5' : '#fef2f2' }}; color: {{ $tx->points > 0 ? '#10b981' : '#ef4444' }};">
                                            <i class="far {{ $tx->points > 0 ? 'fa-plus-circle' : 'fa-minus-circle' }} fs-5"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold text-dark mb-0">{{ $tx->description }}</h6>
                                            <span class="text-muted small">{{ $tx->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <h5 class="fw-bold mb-0 {{ $tx->points > 0 ? 'text-success' : 'text-danger' }}" style="color: {{ $tx->points > 0 ? '#15803d' : '#dc2626' }}; font-weight: 800;">
                                            {{ $tx->points > 0 ? '+' : '' }}{{ number_format($tx->points) }}
                                        </h5>
                                        <span class="text-muted small" style="font-size: 11px;">điểm</span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5">
                                    <span class="fs-1 text-success"><i class="far fa-seedling"></i></span>
                                    <h5 class="fw-bold text-dark mt-3 mb-2">Chưa có giao dịch tích điểm</h5>
                                    <p class="text-muted small">Hãy mua hàng tại cửa hàng đối tác và quét mã QR hóa đơn để tích lũy điểm ngay!</p>
                                    <a href="{{ route('user.scan-qr') }}" class="theme-btn mt-3 py-2 px-4 text-white" style="font-size: 13px;">Quét QR tích điểm ngay</a>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Right Section: Quick Links & Tips -->
                <div class="col-lg-4">
                    <!-- Quick Actions -->
                    <div class="card border-0 shadow-sm p-4 mb-4 text-white" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); border-radius: 20px;">
                        <h5 class="fw-bold text-white mb-3">Thao tác nhanh</h5>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="{{ route('user.scan-qr') }}" class="d-flex flex-column align-items-center justify-content-center p-3 text-decoration-none rounded-3 action-btn" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); transition: all 0.2s;">
                                    <i class="far fa-qrcode text-white fs-3 mb-2"></i>
                                    <span class="text-white fw-bold small" style="font-size: 11px;">Quét QR</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('user.wallet') }}" class="d-flex flex-column align-items-center justify-content-center p-3 text-decoration-none rounded-3 action-btn" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); transition: all 0.2s;">
                                    <i class="far fa-wallet text-white fs-3 mb-2"></i>
                                    <span class="text-white fw-bold small" style="font-size: 11px;">Ví Điểm</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('user.vouchers') }}" class="d-flex flex-column align-items-center justify-content-center p-3 text-decoration-none rounded-3 action-btn" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); transition: all 0.2s;">
                                    <i class="far fa-ticket-alt text-white fs-3 mb-2"></i>
                                    <span class="text-white fw-bold small" style="font-size: 11px;">Đổi Voucher</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('user.green-score') }}" class="d-flex flex-column align-items-center justify-content-center p-3 text-decoration-none rounded-3 action-btn" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); transition: all 0.2s;">
                                    <i class="far fa-star text-white fs-3 mb-2"></i>
                                    <span class="text-white fw-bold small" style="font-size: 11px;">Chỉ Số</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recommended Vouchers -->
                    @if ($vouchers->count() > 0)
                        <div class="card border-0 shadow-sm p-4 mb-4 bg-white" style="border-radius: 20px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold text-dark mb-0">Quà tặng gợi ý</h5>
                                <a href="{{ route('user.vouchers') }}" class="text-success small fw-bold text-decoration-none hover-underline">Tất cả</a>
                            </div>
                            <div class="d-flex flex-column gap-2">
                                @foreach ($vouchers->take(3) as $v)
                                    <div class="d-flex align-items-center justify-content-between p-3 rounded-3 border border-dashed" style="border: 1px dashed #a7f3d0 !important; background: #f0fdf4;">
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="bg-success text-white rounded-3 d-flex align-items-center justify-content-center fw-bold text-center" style="width: 42px; height: 42px; font-size: 11px; background-color: #15803d;">
                                                -{{ $v->discount_percent ?? '10' }}%
                                            </div>
                                            <div style="min-width: 0;">
                                                <h6 class="fw-bold mb-0 text-dark text-truncate" style="max-width: 140px;" title="{{ $v->name }}">{{ $v->name }}</h6>
                                                <span class="text-success small fw-bold" style="font-size: 11px;">{{ number_format($v->points_required) }} điểm</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('user.vouchers') }}" class="btn btn-sm btn-success rounded-pill px-3 fw-bold" style="font-size: 11px; background-color: #15803d; border-color: #15803d;">Đổi</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Green Action Recommendation Tips -->
                    <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background-color: #fefce8; border: 1px solid #fef08a !important;">
                        <h6 class="fw-bold text-warning-emphasis mb-3"><i class="far fa-lightbulb-on me-1 text-warning"></i> Hành động sống xanh hôm nay</h6>
                        <div class="d-flex flex-column gap-3">
                            @foreach ([['far fa-cup-straw','Hạn chế ống hút nhựa tại quán','Giảm bớt ~3g rác thải nhựa'],['far fa-shopping-bag','Dùng túi vải khi đi chợ','Tiết kiệm đến 2 túi nilon'],['far fa-bicycle','Đi bộ/Xe đạp ở cự ly ngắn','Giảm lượng khí thải carbon']] as $tip)
                                <div class="d-flex align-items-start gap-2">
                                    <span class="fs-5 text-warning-emphasis"><i class="{{ $tip[0] }} mt-1"></i></span>
                                    <div>
                                        <h6 class="fw-bold text-warning-emphasis mb-0" style="font-size: 13px;">{{ $tip[1] }}</h6>
                                        <span class="text-muted small" style="font-size: 11px;">{{ $tip[2] }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Load Chart.js CDN explicitly -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('userPointsChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $chartLabels !!},
                datasets: [{
                    label: 'Green Points',
                    data: {!! $chartData !!},
                    borderColor: '#15803d',
                    backgroundColor: 'rgba(21,128,61,0.06)',
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#15803d',
                    pointRadius: 5,
                    pointHoverRadius: 7,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { color: '#f1f5f9' }, ticks: { color: '#94a3b8', font: { size: 11 } } },
                    x: { grid: { display: false }, ticks: { color: '#94a3b8', font: { size: 11 } } }
                }
            }
        });
    });
    </script>

    <style>
        .action-btn:hover {
            background: rgba(255, 255, 255, 0.15) !important;
            transform: translateY(-2px);
        }
        .hover-zoom:hover {
            transform: scale(1.02);
        }
    </style>
</div>
