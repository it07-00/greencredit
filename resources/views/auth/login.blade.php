@extends('layouts.app')

@section('title', 'Đăng nhập')
@section('meta_description', 'Đăng nhập Green Credit để quản lý Green Points, Green Score và các hành động sống xanh.')

@section('content')
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Đăng nhập</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Đăng nhập Green Credit</h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Portals Section inside Login Page -->
    <section class="portals-section fix section-padding bg-light pt-5 pb-5">
        <div class="container">
            <div class="section-title text-center mb-5">
                <span class="text-success fw-bold">Hệ sinh thái Green Credit</span>
                <h2 style="font-size: 32px; font-family: 'Plus Jakarta Sans', sans-serif;">Chọn cổng đăng nhập phù hợp</h2>
                <p class="mt-2 text-muted">Vui lòng chọn vai trò của bạn để hiển thị form đăng nhập tương ứng.</p>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- Cổng Khách Hàng -->
                <div class="col-lg-5 col-md-6">
                    <div class="card border-0 shadow-sm p-4 text-center rounded-4 h-100" style="background: rgba(255, 255, 255, 0.9); border: 1px solid rgba(21, 128, 61, 0.1) !important; transition: all 0.3s ease-in-out;">
                        <div class="avatar mx-auto mb-3 bg-emerald-100 text-emerald-800 rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; font-size: 32px; background-color: #dcfce7; color: #15803d; margin: 0 auto;">
                            <i class="fas fa-user-circle"></i>
                        </div>
                        <h3 class="mb-2 text-dark fw-bold" style="font-size: 22px;">Khách Hàng / Thành Viên</h3>
                        <p class="text-muted mb-4 small" style="min-height: 48px;">Tích lũy Green Points, theo dõi chỉ số Green Score cá nhân, lập kế hoạch Net Zero và quy đổi các voucher ưu đãi hấp dẫn.</p>
                        <div class="d-grid gap-2">
                            <button type="button" onclick="selectRole('Khách Hàng / Thành Viên', true)" class="theme-btn py-3 text-center d-block w-100 border-0">Đăng nhập khách hàng</button>
                            <a href="{{ route('register') }}" class="theme-btn style-2 py-3 text-center d-block" style="margin-top: 10px;">Đăng ký thành viên mới</a>
                        </div>
                    </div>
                </div>
                <!-- Cổng Đối Tác -->
                <div class="col-lg-5 col-md-6">
                    <div class="card border-0 shadow-sm p-4 text-center rounded-4 h-100" style="background: rgba(255, 255, 255, 0.9); border: 1px solid rgba(108, 87, 210, 0.1) !important; transition: all 0.3s ease-in-out;">
                        <div class="avatar mx-auto mb-3 bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 70px; height: 70px; font-size: 32px; background-color: #e0e7ff; color: #4f46e5; margin: 0 auto;">
                            <i class="fas fa-store"></i>
                        </div>
                        <h3 class="mb-2 text-dark fw-bold" style="font-size: 22px;">Cửa Hàng / Đối Tác</h3>
                        <p class="text-muted mb-4 small" style="min-height: 48px;">Sử dụng hệ thống POS tích điểm cho khách, quản lý nhân viên, phát hành voucher xanh quảng bá thương hiệu và xem báo cáo tác động.</p>
                        <div class="d-grid gap-2">
                            <button type="button" onclick="selectRole('Cửa Hàng / Đối Tác', false)" class="theme-btn py-3 text-center d-block w-100 border-0" style="background-color: #1e3a8a;">Đăng nhập đối tác / POS</button>
                            <a href="{{ route('contact') }}" class="theme-btn style-2 py-3 text-center d-block" style="margin-top: 10px;">Đăng ký hợp tác doanh nghiệp</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section id="login-form-section" class="contact-section-6 section-padding" style="display: none; scroll-margin-top: 100px;">
        <div class="container">
            <div class="contact-wrapper-6">
                <div class="plane-shape float-bob-y"><img src="{{ asset('frontend/assets/img/plane-shape.png') }}" alt=""></div>
                <div class="section-title text-center">
                    <span class="wow fadeInUp">Đăng nhập hệ thống</span>
                    <h2 id="login-role-title" class="char-animation">Đăng nhập tài khoản</h2>
                    <p class="mt-3">Nhập tài khoản demo hoặc tài khoản đã đăng ký của bạn để tiếp tục.</p>
                </div>
                <form method="post" action="{{ route('login') }}" class="contact-form-box" style="max-width: 760px; margin: 0 auto;">
                    @csrf
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-12"><div class="form-clt"><input name="email" type="email" value="{{ old('email') }}" placeholder="Địa chỉ email" autocomplete="email" required></div></div>
                        <div class="col-lg-12"><div class="form-clt"><input name="password" type="password" placeholder="Mật khẩu" autocomplete="current-password" required></div></div>
                        @if ($errors->any())<div class="col-lg-12"><div class="alert alert-danger mb-0">{{ $errors->first() }}</div></div>@endif
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="theme-btn">Đăng nhập <i class="far fa-arrow-right"></i></button>
                            
                            <div id="register-promo" class="mt-4">
                                <p class="mb-0">Chưa có tài khoản? <a href="{{ route('register') }}" style="color:#15803d;font-weight:700;">Đăng ký miễn phí</a></p>
                            </div>
                            <div id="partner-promo" class="mt-4" style="display: none;">
                                <p class="mb-0">Muốn liên kết kinh doanh? <a href="{{ route('contact') }}" style="color:#1e3a8a;font-weight:700;">Đăng ký hợp tác doanh nghiệp</a></p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function selectRole(roleName, isCustomer) {
            const formSection = document.getElementById('login-form-section');
            const roleTitle = document.getElementById('login-role-title');
            const registerPromo = document.getElementById('register-promo');
            const partnerPromo = document.getElementById('partner-promo');
            
            roleTitle.innerText = 'Đăng nhập ' + roleName;
            formSection.style.display = 'block';
            
            if (isCustomer) {
                registerPromo.style.display = 'block';
                partnerPromo.style.display = 'none';
            } else {
                registerPromo.style.display = 'none';
                partnerPromo.style.display = 'block';
            }
            
            setTimeout(() => {
                formSection.scrollIntoView({ behavior: 'smooth' });
            }, 100);
        }

        // Auto-show form if returning with validation errors
        @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                selectRole('Tài khoản', true);
            });
        @endif
    </script>
@endsection
