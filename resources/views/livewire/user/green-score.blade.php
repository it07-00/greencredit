<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Green Score</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Chỉ số sống xanh (Green Score)</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <!-- Top Summary Card -->
            <div class="card border-0 shadow-sm p-4 rounded-4 mb-4" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); color: #fff; border-radius: 20px;">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <span class="badge bg-white text-success px-3 py-2 rounded-pill fw-bold mb-3" style="font-size: 13px;"><i class="far fa-seedling me-1"></i> Điểm Green Score</span>
                        <h3 class="fw-bold mb-2 text-white text-3xl">Đánh giá chỉ số sống xanh cá nhân</h3>
                        <p class="mb-0 text-white-50">Điểm Green Score được tính toán dựa trên mức độ tích cực tham gia các hoạt động bảo vệ môi trường, giảm thiểu nhựa và CO₂.</p>
                    </div>
                    
                    <div class="col-md-4 text-center mt-4 mt-md-0">
                        <div class="p-4 rounded-4 text-white" style="background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.15); border-radius: 20px; display: inline-block; min-width: 220px;">
                            <span class="text-white-50 text-uppercase fw-bold tracking-wider" style="font-size: 11px;">Green Score</span>
                            <h1 class="fw-black text-white display-4 my-2" style="font-size: 48px; font-weight: 900;">{{ $history->score }}</h1>
                            <p class="text-emerald-300 small mb-0"><i class="far fa-chevron-up me-1"></i> Tăng 120 điểm tháng này</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 5 Thẻ chỉ số kpi -->
            <div class="row g-3 mb-4">
                @foreach ([['far fa-users text-success','25.000+','Người dùng xanh'],['far fa-store text-primary','350+','Cửa hàng đối tác'],['far fa-leaf text-success','1,2 triệu','Điểm xanh đã tạo'],['far fa-recycle text-info','18 tấn','Nhựa giảm thiểu'],['far fa-cloud-share text-warning','2.8 tấn','CO₂ giảm thiểu']] as $stat)
                    <div class="col-md-6 col-lg">
                        <div class="card border-0 shadow-sm p-3 bg-white h-100 text-center" style="border-radius: 15px;">
                            <div class="mb-2 text-muted"><i class="{{ $stat[0] }} fs-4"></i></div>
                            <h4 class="fw-bold text-dark mb-1" style="font-size: 20px;">{{ $stat[1] }}</h4>
                            <span class="text-muted small" style="font-size: 11px;">{{ $stat[2] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row g-4">
                <!-- Left: Analytics Charts & Habits -->
                <div class="col-lg-8">
                    <!-- Behavior Analytics columns -->
                    <div class="row g-3 mb-4">
                        @foreach ([['Xu hướng điểm xanh', $history->score.' điểm', '↑ 120 điểm so với 6 tháng trước', 'from-emerald-200 to-emerald-600', '#10b981'], ['Lượng CO₂ giảm', '128 kg', '↑ 18 kg so với tháng trước', 'from-lime-200 to-green-600', '#84cc16'], ['Lượng nhựa giảm', '3,6 kg', '↑ 0,8 kg so với tháng trước', 'from-teal-200 to-emerald-500', '#0d9488']] as $chart)
                            <div class="col-md-4">
                                <div class="card border-0 shadow-sm p-4 bg-white h-100" style="border-radius: 20px;">
                                    <h6 class="fw-bold text-dark mb-1" style="font-size: 13px;">{{ $chart[0] }}</h6>
                                    <h3 class="fw-bold text-success my-2" style="color: {{ $chart[4] }} !important; font-size: 24px; font-weight: 850;">{{ $chart[1] }}</h3>
                                    <p class="text-muted small mb-3" style="font-size: 11px;">{{ $chart[2] }}</p>
                                    
                                    <!-- Bar Chart simulation -->
                                    <div class="d-flex align-items-end justify-content-between border-start border-bottom px-2 pt-3" style="height: 100px; border-color: #f1f5f9 !important; border-left: 1px solid #f1f5f9 !important; border-bottom: 1px solid #f1f5f9 !important;">
                                        @foreach ([35,48,42,70,62,82] as $bar)
                                            <div class="rounded-top" style="width: 12%; height: {{ $bar }}%; background-color: {{ $chart[4] }}; opacity: 0.7;"></div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Action ratio -->
                    <div class="card border-0 shadow-sm p-4 bg-white mb-4" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-4">Tỷ lệ hành động xanh</h5>
                        <div class="row g-4 align-items-center">
                            <div class="col-md-4 text-center">
                                <div class="position-relative d-inline-block p-4 rounded-circle" style="background: #f0fdf4; border: 4px solid #dcfce7; width: 140px; height: 140px; display: inline-flex !important; align-items: center; justify-content: center;">
                                    <div>
                                        <h3 class="fw-bold text-success mb-0" style="font-size: 28px; font-weight: 800;">78%</h3>
                                        <span class="text-muted small" style="font-size: 10px;">Chỉ số tốt</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-column gap-3">
                                    @foreach ([['Giao thông xanh','86%','bg-success'],['Tiêu dùng bền vững','74%','bg-primary'],['Tiết kiệm năng lượng','70%','bg-info'],['Giảm thiểu rác thải','82%','bg-warning']] as $ratio)
                                        <div>
                                            <div class="d-flex justify-content-between small fw-bold mb-1">
                                                <span>{{ $ratio[0] }}</span>
                                                <span class="text-dark">{{ $ratio[1] }}</span>
                                            </div>
                                            <div class="progress" style="height: 8px; border-radius: 999px; background-color: #f1f5f9;">
                                                <div class="progress-bar {{ $ratio[2] }}" role="progressbar" style="width: {{ $ratio[1] }}; border-radius: 999px;" aria-valuenow="{{ intval($ratio[1]) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Top green habits -->
                    <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3">Top thói quen xanh tốt nhất</h5>
                        <div class="list-group list-group-flush">
                            @foreach ([['far fa-tint text-primary','Mang bình nước cá nhân','28 lần','+28 điểm'],['far fa-cup-straw text-danger','Hạn chế ống hút nhựa','25 lần','+25 điểm'],['far fa-bicycle text-success','Đi bộ / Xe đạp gần nhà','18 lần','+18 điểm'],['far fa-recycle text-info','Phân loại tái chế rác thải','15 lần','+15 điểm'],['far fa-shopping-bag text-warning','Sử dụng túi vải mua sắm','14 lần','+14 điểm']] as $habit)
                                <div class="list-group-item d-flex align-items-center justify-content-between border-0 px-0 py-3 border-bottom border-dashed" style="border-bottom-style: dashed !important;">
                                    <div class="d-flex align-items-center gap-3">
                                        <span class="fs-5"><i class="{{ $habit[0] }}"></i></span>
                                        <span class="fw-bold text-dark" style="font-size: 14px;">{{ $habit[1] }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-4">
                                        <span class="text-muted small">{{ $habit[2] }}</span>
                                        <strong class="text-success" style="font-weight: 750;">{{ $habit[3] }}</strong>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Rankings & Levels -->
                <div class="col-lg-4">
                    <!-- Level ranking list -->
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3">Hạng cấp Green Score</h5>
                        <div class="d-flex flex-column gap-2 mb-3">
                            @foreach ($levels as $level)
                                <div class="p-2 rounded-3 d-flex justify-content-between align-items-center {{ $history->level_code === $level->code ? 'bg-success-subtle border border-success' : 'bg-light' }}" style="font-size: 13px; background-color: {{ $history->level_code === $level->code ? '#f0fdf4' : '#f8fafc' }} !important; border-color: {{ $history->level_code === $level->code ? '#22c55e' : 'transparent' }} !important;">
                                    <span class="fw-bold text-dark"><i class="far fa-seedling text-success me-1"></i> {{ $level->name }}</span>
                                    <span class="text-muted small">{{ $level->min_score }} - {{ $level->max_score }}</span>
                                </div>
                            @endforeach
                        </div>
                        <div class="progress" style="height: 8px; border-radius: 999px; background-color: #f1f5f9;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ min(100, $history->score / 10) }}%; border-radius: 999px; background-color: #15803d !important;" aria-valuenow="{{ min(100, $history->score / 10) }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <!-- Monthly Leaderboard -->
                    <div class="card border-0 shadow-sm p-4 mb-4 bg-white" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3">Bảng xếp hạng tháng</h5>
                        <div class="d-flex flex-column gap-2">
                            @foreach ([['1','Minh Huy','1.050 điểm'],['2','Ngọc Anh','980 điểm'],['3','Hoàng Nam','930 điểm'],['4','Bạn',''.$history->score.' điểm']] as $rank)
                                <div class="d-flex justify-content-between align-items-center p-3 rounded-3 {{ $rank[1] === 'Bạn' ? 'bg-success text-white' : 'bg-light' }}" style="background-color: {{ $rank[1] === 'Bạn' ? '#15803d' : '#f8fafc' }} !important; color: {{ $rank[1] === 'Bạn' ? '#fff' : '#1e293b' }} !important;">
                                    <span class="fw-bold">{{ $rank[0] }}. {{ $rank[1] }}</span>
                                    <strong class="small">{{ $rank[2] }}</strong>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Achievements/Milestones -->
                    <div class="card border-0 shadow-sm p-4 bg-white" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3">Cột mốc sống xanh</h5>
                        <div class="d-flex flex-column gap-3 small">
                            @foreach ([['far fa-check text-success','Tham gia Green Credit','06/2024'],['far fa-check text-success','Đạt cấp độ Leaf','07/2024'],['far fa-check text-success','Đạt cấp độ Tree','03/2025'],['far fa-circle text-muted','Đạt cấp độ Forest','Sắp tới'],['far fa-circle text-muted','Trở thành Net Zero Hero','Sắp tới']] as $milestone)
                                <div class="d-flex justify-content-between align-items-center pb-2 border-bottom border-light">
                                    <span class="text-dark"><i class="{{ $milestone[0] }} me-2"></i>{{ $milestone[1] }}</span>
                                    <span class="text-muted small">{{ $milestone[2] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
