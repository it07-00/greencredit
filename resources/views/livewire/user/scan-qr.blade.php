<div>
    <!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Tích điểm</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Quét QR hóa đơn xanh</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="contact-section-6 section-padding bg-light">
        <div class="container">
            <div class="row g-4 align-items-stretch mb-5">
                <!-- Left: Guide info -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4 h-100 rounded-4 bg-white" style="border-radius: 20px;">
                        <span class="text-success fw-bold text-uppercase mb-2" style="font-size: 12px;">Quy trình tích điểm</span>
                        <h2 class="fw-bold text-dark mb-3">Tích điểm Green Points dễ dàng</h2>
                        <p class="text-muted leading-relaxed mb-4">
                            Xác thực hóa đơn mua sắm của bạn chỉ trong vài giây. Mỗi hành động bảo vệ môi trường được ghi nhận sẽ giúp tích lũy điểm thưởng và giảm phát thải CO₂.
                        </p>
                        <div class="row g-3 mt-2">
                            @foreach ([['far fa-bolt text-success','Xác thực nhanh chóng','Hệ thống quét nhận điểm ngay lập tức.'],['far fa-shield-check text-primary','Minh bạch tin cậy','Cơ chế chống gian lận bảo vệ điểm thưởng của bạn.'],['far fa-wallet text-info','Tích lũy ví xanh','Điểm thưởng lưu trữ trực tiếp trong Green Wallet.']] as $pill)
                                <div class="col-12">
                                    <div class="d-flex align-items-center gap-3 p-3 rounded-3 bg-light">
                                        <div class="rounded-circle d-flex align-items-center justify-content-center bg-white shadow-sm" style="width: 44px; height: 44px; flex-shrink:0;">
                                            <i class="{{ $pill[0] }} fs-5"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-1 text-dark">{{ $pill[1] }}</h6>
                                            <p class="text-muted small mb-0" style="font-size: 12px;">{{ $pill[2] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                
                <!-- Right: Scan Simulation / Success Card -->
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4 h-100 rounded-4 text-white" style="background: linear-gradient(135deg, #15803d 0%, #064e3b 100%); border-radius: 20px;">
                        <div class="text-center py-4">
                            <div class="rounded-circle bg-white bg-opacity-10 d-inline-flex align-items-center justify-content-center mb-3 shadow-lg" style="width: 80px; height: 80px; border: 2px dashed rgba(255,255,255,0.4);">
                                <i class="far fa-qrcode text-white fs-1"></i>
                            </div>
                            <h3 class="fw-bold text-white mb-2">Quét mã nhận điểm</h3>
                            <p class="text-white-50 small mb-4">Quét QR hoặc nhập mã Token bên dưới để tích lũy Green Points</p>
                            
                            <!-- Success view -->
                            @if ($success)
                                <div class="p-4 rounded-4 bg-white text-dark shadow text-center border-0 mb-3 mx-auto" style="max-width: 380px; border-radius: 20px;">
                                    <div class="rounded-circle bg-success bg-opacity-10 text-success d-inline-flex align-items-center justify-content-center mb-3" style="width: 52px; height: 52px; background: #ecfdf5; color: #10b981;">
                                        <i class="far fa-check-circle fs-3"></i>
                                    </div>
                                    <h5 class="fw-bold text-success mb-1">Xác thực thành công!</h5>
                                    <h1 class="fw-bold text-success my-2" style="font-size: 40px; font-weight: 800;">+{{ $success['points'] }}</h1>
                                    <p class="text-muted fw-bold small mb-3">Green Points</p>
                                    <div class="p-3 bg-light rounded-3 text-start small">
                                        <div class="d-flex justify-content-between mb-1"><span>Nhựa giảm thiểu:</span><strong>{{ $success['plastic'] }}g</strong></div>
                                        <div class="d-flex justify-content-between mb-1"><span>CO₂ giảm thiểu:</span><strong>{{ $success['co2'] }}kg</strong></div>
                                        <div class="d-flex justify-content-between"><span>Mã giao dịch:</span><span class="text-truncate" style="max-width: 140px;">{{ $success['code'] }}</span></div>
                                    </div>
                                </div>
                            @else
                                <div class="p-4 rounded-4 text-white text-center mb-3 mx-auto" style="max-width: 380px; background: rgba(255,255,255,0.06); border: 1px dashed rgba(255,255,255,0.2); border-radius: 20px;">
                                    <div class="mb-2"><i class="far fa-file-invoice fs-2 text-white-50"></i></div>
                                    <p class="small text-white-50 mt-2 mb-0">Sau khi xác thực thành công, điểm số và tác động môi trường sẽ hiển thị tại đây.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Steps & Input Token Form -->
            <div class="row g-4 align-items-start">
                <!-- Left form: Input token -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3"><i class="far fa-keyboard text-success me-2"></i>Nhập mã QR Token</h5>
                        <p class="text-muted small mb-4">Nhập mã định danh token của hóa đơn (hỗ trợ định dạng `GREEN-CREDIT:token` hoặc URL chứa mã token).</p>
                        
                        <form wire:submit="scan">
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-muted">Mã Token</label>
                                <input wire:model="token" type="text" class="form-control rounded-3 p-3" placeholder="GREEN-CREDIT:..." autofocus style="border: 1.5px solid #e2e8f0; border-radius: 10px;">
                                @error('token') <span class="text-danger small mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success w-100 py-3 rounded-3 fw-bold shadow-sm" style="background-color: #15803d; border-color: #15803d; border-radius: 10px;">
                                <i class="far fa-shield-check me-2"></i>Xác thực mã QR
                            </button>
                        </form>

                        @if ($error)
                            <div class="alert alert-danger rounded-3 mt-4 mb-0 small">
                                <i class="far fa-exclamation-triangle me-2"></i>{{ $error }}
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Middle: Green actions -->
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white h-100" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3"><i class="far fa-leaf text-success me-2"></i>Hành động xanh tiêu biểu</h5>
                        <p class="text-muted small mb-4">Các hành động xanh được hệ thống hỗ trợ tích lũy điểm khi đi mua sắm tại cửa hàng đối tác:</p>
                        <div class="d-flex flex-column gap-2">
                            @foreach ($displayActions as $action)
                                <div class="d-flex justify-content-between align-items-center p-3 rounded-3 bg-light animate-fade-in">
                                    <span class="fw-bold text-dark" style="font-size: 13px;"><i class="{{ $action['icon'] }} me-2"></i> {{ $action['name'] }}</span>
                                    <span class="badge bg-success text-white fw-bold" style="background-color: #15803d; border-radius: 6px;">+{{ $action['points'] }} điểm</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right: Rules info -->
                <div class="col-md-12 col-lg-4">
                    <div class="card border-0 shadow-sm p-4 rounded-4 bg-white h-100" style="border-radius: 20px;">
                        <h5 class="fw-bold text-dark mb-3"><i class="far fa-info-circle text-success me-2"></i>Quy tắc xác thực</h5>
                        <ul class="list-unstyled small text-muted leading-relaxed">
                            <li class="mb-3 d-flex align-items-start gap-2">
                                <i class="far fa-check-circle text-success mt-1"></i>
                                <span>Mỗi mã QR chỉ được quét và nhận điểm **một lần duy nhất** cho mỗi khách hàng.</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start gap-2">
                                <i class="far fa-check-circle text-success mt-1"></i>
                                <span>Mã hóa đơn xanh có hiệu lực tích điểm trong vòng **7 ngày** kể từ ngày in hóa đơn.</span>
                            </li>
                            <li class="mb-3 d-flex align-items-start gap-2">
                                <i class="far fa-check-circle text-success mt-1"></i>
                                <span>Hệ thống áp dụng AI chống gian lận nhằm bảo vệ cộng đồng tiêu dùng xanh công bằng.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
