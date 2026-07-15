@extends('layouts.app')

@section('title', 'Trang chủ')
@section('meta_description', 'Green Credit giúp người dùng tích điểm từ hành vi tiêu dùng bền vững, theo dõi Green Score và xây dựng lộ trình Net Zero.')

@section('content')
<!-- Hero Section Start -->
    <section class="hero-section hero-1 bg-cover" style="background-image: url('{{ asset('frontend/assets/img/hero/hero-1-bg.jpg') }}');">
        <div class="left-shape float-bob-x">
            <img src="{{ asset('frontend/assets/img/hero/left-shape.png') }}" alt="img">
        </div>
        <div class="plane-shape">
            <img src="{{ asset('frontend/assets/img/hero/plane-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="char-animation">Sống xanh, tích điểm thông minh</h1>
                        <p class="wow fadeInUp" data-wow-delay=".3s">Tích Green Points từ mỗi hành động bền vững và xây dựng lộ trình Net Zero của riêng bạn.</p>
                        <div class="client-info wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('frontend/assets/img/hero/client-info.png') }}" alt="img">
                            <img src="{{ asset('frontend/assets/img/hero/client-info-letter.png') }}" alt="img">
                        </div>
                        <div class="hero-btn wow fadeInUp" data-wow-delay=".7s">
                            <a href="{{ route('contact') }}" class="theme-btn">
                                Bắt đầu ngay
                                <i class="far fa-arrow-right"></i>
                            </a>
                            <a href="{{ route('about') }}" class="theme-btn style-2">
                                Khám phá thêm
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="hero-img">
                        <img src="{{ asset('frontend/assets/img/hero/hero-1-img.png') }}" alt="img">
                        <div class="box-shape float-bob-y">
                            <img src="{{ asset('frontend/assets/img/hero/box-shape-2.png') }}" alt="img">
                        </div>
                        <div class="box-shape-2 float-bob-y">
                            <img src="{{ asset('frontend/assets/img/hero/box-shape.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tính năng Section Start -->
    <section class="service-section fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Chào mừng đến Green Credit</span>
                <h2 class="char-animation">Mỗi hành động nhỏ<br>Tạo nên tương lai xanh</h2>
                <p class="mt-3 wow fadeInUp" data-wow-delay=".4s">Green Credit là nền tảng tiên phong giúp kết nối người dùng, cửa hàng đối tác và nhà tài trợ <br> nhằm thúc đẩy lối sống xanh, giảm thiểu rác thải nhựa và hướng tới mục tiêu phát thải ròng bằng không (Net Zero).</p>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items-1 item_right_1">
                        <div class="service-icon">
                            <i class="flaticon-market-analysis"></i>
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Quét QR hóa đơn xanh</a></h3>
                            <p>Ghi nhận hành động xanh<br>nhanh chóng và minh bạch.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items-1 item_right_2">
                        <div class="service-icon color-2">
                            <i class="flaticon-video-marketing-1"></i>
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Green Wallet</a></h3>
                            <p>Tích lũy và quản lý điểm<br>Green Points dễ dàng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items-1 item_left_1">
                        <div class="service-icon color-3">
                            <i class="flaticon-presentation"></i>
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Đổi voucher xanh</a></h3>
                            <p>Quy đổi quà tặng hấp dẫn<br>từ đối tác môi trường.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="service-card-items-1 item_left_1">
                        <div class="service-icon color-4">
                            <i class="flaticon-pie-chart"></i>
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Green Score</a></h3>
                            <p>Đánh giá mức độ sống xanh<br>và nhận ưu đãi đặc quyền.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section Start -->
    <section class="about-section fix section-padding pt-0">
        <div class="container">
            <div class="about-wrapper">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img fix appear_left">
                            <img src="{{ asset('frontend/assets/img/about/Frame.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title mb-0">
                                <span class="wow fadeInUp">Về Green Credit</span>
                                <h2 class="char-animation">Vì sao nên tham gia<br>Green Credit?</h2>
                            </div>
                            <p class="about-text wow fadeInUp" data-wow-delay=".4s">Chúng tôi đồng hành cùng bạn trên hành trình kiến tạo cuộc sống bền vững, mang lại những giải pháp thiết thực để tích điểm từ thói quen tiêu dùng hàng ngày.</p>
                            <div class="icon-items wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon">
                                    <i class="flaticon-pie-chart"></i>
                                </div>
                                <div class="content">
                                    <h3>Đổi voucher xanh</h3>
                                    <p>Quy đổi điểm tích lũy của bạn thành các voucher mua sắm hấp dẫn từ hàng trăm thương hiệu đối tác đồng hành.</p>
                                </div>
                            </div>
                            <ul class="list-items wow fadeInUp" data-wow-delay=".4s">
                                <li>
                                    <i class="flaticon-check"></i>
                                    Tích lũy Green Points nhanh chóng qua QR Code hóa đơn
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Nâng hạng Green Score để nhận các đặc quyền tài chính ưu đãi
                                </li>
                            </ul>
                            <a href="{{ route('about') }}" class="theme-btn wow fadeInUp" data-wow-delay=".6s">
                                Khám phá thêm Giới thiệu
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tính năng Section Start -->
    <section class="service-section-solve fix section-padding" style="background-image: url('{{ asset('frontend/assets/img/service/service-bg.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Tính năng</span>
                <h2 class="text-white char-animation">Hệ sinh thái sống xanh<br>trong một nền tảng</h2>
            </div>
            <div class="row g-0">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="service-card-items border-radius-style">
                        <div class="service-icon">
                            <img src="{{ asset('frontend/assets/img/service/icon-01.png') }}" alt="img">
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Quét QR hóa đơn xanh</a></h3>
                            <p>Quét QR trên hóa đơn mua sắm tại các cửa hàng đối tác để tự động tích lũy điểm xanh tương ứng với hành động bảo vệ môi trường.</p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="service-card-items bg-1">
                        <div class="service-icon">
                            <img src="{{ asset('frontend/assets/img/service/icon-02.png') }}" alt="img">
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Green Wallet & lịch sử điểm</a></h3>
                            <p>Quản lý số dư Green Points, xem lịch sử nhận và đổi điểm chi tiết theo thời gian thực một cách minh bạch và an toàn.</p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="service-card-items bg-2">
                        <div class="service-icon">
                            <img src="{{ asset('frontend/assets/img/service/icon-03.png') }}" alt="img">
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Green Score & cấp độ xanh</a></h3>
                            <p>Đánh giá mức độ sống xanh của bạn dựa trên 5 tiêu chí: hành vi, tính nhất quán, tính đa dạng, xác thực và cộng đồng.</p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="service-card-items bg-3">
                        <div class="service-icon">
                            <img src="{{ asset('frontend/assets/img/service/icon-04.png') }}" alt="img">
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Voucher & Net Zero Planner</a></h3>
                            <p>Quy đổi điểm xanh thành voucher quà tặng hấp dẫn và thiết lập lộ trình giảm thiểu phát thải CO2, rác thải nhựa cá nhân hàng tháng.</p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Brand / Partners Section Start -->
    <div class="gc-partners-section fix section-padding pt-0" style="background-image: url('{{ asset('frontend/assets/img/service/service-bg.jpg') }}');">
        <div class="container">
            <div class="section-title text-center mb-5 wow fadeInUp">
                <span>Đối tác liên kết</span>
                <p class="char-animation mt-2">Green Credit kết nối hơn <span>350+</span> thương hiệu &amp; cửa hàng đối tác</p>
            </div>
        </div>

        <!-- Marquee Row 1 - scroll left -->
        <div class="gc-marquee-wrapper" style="overflow:hidden;position:relative;">
            <!-- Fade edges -->
            <div style="position:absolute;left:0;top:0;bottom:0;width:80px;background:linear-gradient(to right,#0d1f0f,transparent);z-index:2;pointer-events:none;"></div>
            <div style="position:absolute;right:0;top:0;bottom:0;width:80px;background:linear-gradient(to left,#0d1f0f,transparent);z-index:2;pointer-events:none;"></div>

            <div class="gc-marquee gc-marquee-left" style="display:flex;gap:20px;padding:10px 0;width:max-content;animation:gcMarqueeLeft 30s linear infinite;">
                @php
                $partners1 = [
                    ['name' => 'The Coffee House', 'icon' => 'fa-coffee', 'color' => '#c0392b'],
                    ['name' => 'Highlands Coffee', 'icon' => 'fa-mug-hot', 'color' => '#8B0000'],
                    ['name' => 'Grab', 'icon' => 'fa-car', 'color' => '#00b14f'],
                    ['name' => 'Vinmart', 'icon' => 'fa-shopping-basket', 'color' => '#0066cc'],
                    ['name' => 'Circle K', 'icon' => 'fa-store', 'color' => '#e74c3c'],
                    ['name' => 'GreenFeed', 'icon' => 'fa-leaf', 'color' => '#27ae60'],
                    ['name' => 'Saigon Co.op', 'icon' => 'fa-shopping-cart', 'color' => '#e67e22'],
                    ['name' => 'Lotte Mart', 'icon' => 'fa-building', 'color' => '#c0392b'],
                    ['name' => 'Baemin', 'icon' => 'fa-bicycle', 'color' => '#00c3c3'],
                    ['name' => 'Pharmacity', 'icon' => 'fa-pills', 'color' => '#2980b9'],
                    ['name' => 'FPT Shop', 'icon' => 'fa-mobile-alt', 'color' => '#f39c12'],
                    ['name' => 'Gojek', 'icon' => 'fa-motorcycle', 'color' => '#00aed6'],
                ];
                // Duplicate for seamless loop
                $partners1 = array_merge($partners1, $partners1);
                @endphp

                @foreach($partners1 as $p)
                <div class="gc-partner-card" style="
                    background:#fff;
                    border-radius:14px;
                    padding:14px 22px;
                    display:flex;
                    align-items:center;
                    gap:10px;
                    min-width:180px;
                    box-shadow:0 2px 12px rgba(0,0,0,0.08);
                    border:1px solid #e8f5e9;
                    flex-shrink:0;
                    white-space:nowrap;
                ">
                    <span style="width:34px;height:34px;border-radius:50%;background:{{ $p['color'] }}18;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas {{ $p['icon'] }}" style="color:{{ $p['color'] }};font-size:15px;"></i>
                    </span>
                    <span style="font-size:14px;font-weight:700;color:#1a1a2e;letter-spacing:-0.2px;">{{ $p['name'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Marquee Row 2 - scroll right (opposite direction) -->
        <div class="gc-marquee-wrapper mt-4" style="overflow:hidden;position:relative;">
            <div style="position:absolute;left:0;top:0;bottom:0;width:80px;background:linear-gradient(to right,#0d1f0f,transparent);z-index:2;pointer-events:none;"></div>
            <div style="position:absolute;right:0;top:0;bottom:0;width:80px;background:linear-gradient(to left,#0d1f0f,transparent);z-index:2;pointer-events:none;"></div>

            <div class="gc-marquee gc-marquee-right" style="display:flex;gap:20px;padding:10px 0;width:max-content;animation:gcMarqueeRight 35s linear infinite;">
                @php
                $partners2 = [
                    ['name' => 'Thế Giới Di Động', 'icon' => 'fa-mobile-alt', 'color' => '#e74c3c'],
                    ['name' => 'Viettel Pay', 'icon' => 'fa-credit-card', 'color' => '#e74c3c'],
                    ['name' => 'MoMo', 'icon' => 'fa-wallet', 'color' => '#a50064'],
                    ['name' => 'VinFast', 'icon' => 'fa-car-side', 'color' => '#0066cc'],
                    ['name' => 'Sendo', 'icon' => 'fa-tags', 'color' => '#e74c3c'],
                    ['name' => 'Lazada', 'icon' => 'fa-box', 'color' => '#0f146d'],
                    ['name' => 'Tiki', 'icon' => 'fa-shopping-bag', 'color' => '#1a94ff'],
                    ['name' => 'Green Farm', 'icon' => 'fa-seedling', 'color' => '#27ae60'],
                    ['name' => 'Coconut Media', 'icon' => 'fa-broadcast-tower', 'color' => '#8e44ad'],
                    ['name' => 'EcoMart', 'icon' => 'fa-recycle', 'color' => '#16a085'],
                    ['name' => 'PetMart', 'icon' => 'fa-paw', 'color' => '#d35400'],
                    ['name' => 'Fahasa', 'icon' => 'fa-book', 'color' => '#2c3e50'],
                ];
                $partners2 = array_merge($partners2, $partners2);
                @endphp

                @foreach($partners2 as $p)
                <div class="gc-partner-card" style="
                    background:#fff;
                    border-radius:14px;
                    padding:14px 22px;
                    display:flex;
                    align-items:center;
                    gap:10px;
                    min-width:180px;
                    box-shadow:0 2px 12px rgba(0,0,0,0.08);
                    border:1px solid #e8f5e9;
                    flex-shrink:0;
                    white-space:nowrap;
                ">
                    <span style="width:34px;height:34px;border-radius:50%;background:{{ $p['color'] }}18;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                        <i class="fas {{ $p['icon'] }}" style="color:{{ $p['color'] }};font-size:15px;"></i>
                    </span>
                    <span style="font-size:14px;font-weight:700;color:#1a1a2e;letter-spacing:-0.2px;">{{ $p['name'] }}</span>
                </div>
                @endforeach
            </div>
        </div>

        @push('styles')
        <style>
            .gc-partners-section {
                padding-top: 60px;
                padding-bottom: 80px;
            }
            @keyframes gcMarqueeLeft {
                0%   { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            @keyframes gcMarqueeRight {
                0%   { transform: translateX(-50%); }
                100% { transform: translateX(0); }
            }
            .gc-partner-card {
                transition: transform 0.2s, box-shadow 0.2s;
                cursor: default;
            }
            .gc-partner-card:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 24px rgba(21,128,61,0.12) !important;
                border-color: #bbf7d0 !important;
            }
            .gc-marquee:hover {
                animation-play-state: paused;
            }
        </style>
        @endpush
    </div>


    <!-- Why Choose Us Section Start -->
    <section class="choose-us-section fix section-padding">
        <div class="container">
            <div class="choose-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="choose-us-content">
                            <div class="section-title">
                                <span class="wow fadeInUp">Tại sao chọn chúng tôi</span>
                                <h2 class="char-animation">Minh bạch dữ liệu, tạo tác động bền vững</h2>
                            </div>
                            <p class="choose-us-text wow fadeInUp" data-wow-delay=".4s">Green Credit mang lại sự tin cậy tuyệt đối thông qua hệ thống ghi nhận minh bạch và những phần quà thiết thực hướng tới cộng đồng sống xanh bền vững.</p>
                            <div class="icon-box-items">
                                <div class="icon-box wow fadeInUp" data-wow-delay=".2s">
                                    <div class="icon">
                                        <i class="flaticon-mission"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Sứ mệnh của chúng tôi</h6>
                                        <h5>Chúng tôi không chỉ cung cấp điểm thưởng<br>mà còn xây dựng một cộng đồng sống xanh đáng tin cậy.</h5>
                                    </div>
                                </div>
                                <div class="icon-box style-2 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon">
                                        <i class="flaticon-vision"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Tầm nhìn của chúng tôi</h6>
                                        <h5>Mỗi người dùng và doanh nghiệp đều có thể<br>đo lường, cải thiện tác động môi trường của mình.</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-us-card wow fadeInUp" data-wow-delay=".6s">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    Liên hệ
                                    <i class="far fa-arrow-right"></i>
                                </a>
                                <div class="phone-box">
                                    <div class="icon">
                                        <i class="far fa-phone-alt"></i>
                                    </div>
                                    <div class="content">
                                        <p>Email liên hệ</p>
                                        <h5>{{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-us-img agn-choose-5-img">
                            <img src="{{ asset('frontend/assets/img/choose-us/choose-us.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section Start -->
    <section class="counter-section fix section-padding pt-0">
        <div class="container">
            <div class="counter-wrapper">
                <div class="counter-items wow fadeInUp" data-wow-delay=".2s">
                    <div class="icon">
                        <i class="flaticon-expertise"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="350">00</span>+</h2>
                        <p>Đối tác liên kết</p>
                    </div>
                </div>
                <div class="counter-items style-2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="flaticon-file"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="25000">00</span>+</h2>
                        <p>Người dùng sống xanh</p>
                    </div>
                </div>
                <div class="counter-items style-3 wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="flaticon-medal"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="12">00</span>M+</h2>
                        <p>Điểm tích lũy</p>
                    </div>
                </div>
                <div class="counter-items style-4 wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="flaticon-hire"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="18">00</span>Tấn</h2>
                        <p>Nhựa & CO2 giảm thiểu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- pricing Section Start -->
    <section class="pricing-section fix section-padding" style="background-image: url('{{ asset('frontend/assets/img/pricing-bg.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Hệ thống cấp độ xanh</span>
                <h2 class="char-animation">Nâng hạng Green Score, mở khóa thêm quyền lợi</h2>
                <p class="mt-3 wow fadeInUp" data-wow-delay=".4s">
                    Mỗi cấp độ xanh mở ra những đặc quyền lớn hơn từ các đối tác liên kết tài chính, voucher quà tặng và cơ hội tham gia các chiến dịch sống xanh lớn.
                </p>
                <div class="d-flex justify-content-center mt-3 mt-md-0">
                    <div class="pricing-two__tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="pt-1-tab" data-bs-toggle="tab" data-bs-target="#pt-1" type="button" role="tab" aria-controls="pt-1" aria-selected="true">Cấp độ cơ bản</button>
                                <button class="nav-link" id="pt-2-tab" data-bs-toggle="tab" data-bs-target="#pt-2" type="button" role="tab" aria-controls="pt-2" aria-selected="false" tabindex="-1">Cấp độ nâng cao</button>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pricing__tab-content">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="pt-1" role="tabpanel" aria-labelledby="pt-1-tab">
                        <div class="pricing-package-wrapper">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Seed</h3>
                                            <h2>0 - 199<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="{{ route('green-score.public') }}" class="theme-btn">
                                            Xem chi tiết
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tích lũy điểm từ hóa đơn
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Theo dõi ví điểm và lịch sử
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tham gia thử thách cộng đồng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Đổi các voucher cơ bản
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Ưu đãi lãi suất tài chính xanh
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Nhận quà tặng hiện vật đặc biệt
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="pricing-box-items active">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Leaf</h3>
                                            <h2>200 - 399<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="{{ route('green-score.public') }}" class="theme-btn">
                                            Xem chi tiết
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tích lũy điểm từ hóa đơn
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Theo dõi ví điểm và lịch sử
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tham gia thử thách cộng đồng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Đổi các voucher nâng cao
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Báo cáo phân tích hành vi tiêu dùng
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Ưu đãi lãi suất tài chính xanh
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Tree</h3>
                                            <h2>400 - 699<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="{{ route('green-score.public') }}" class="theme-btn">
                                            Xem chi tiết
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tích lũy điểm từ hóa đơn
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Theo dõi ví điểm và lịch sử
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tham gia thử thách cộng đồng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Đổi các voucher đặc biệt
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Báo cáo phân tích hành vi tiêu dùng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Ưu đãi lãi suất tài chính xanh (0.5%)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pt-2" role="tabpanel" aria-labelledby="pt-2-tab">
                        <div class="pricing-package-wrapper">
                            <div class="row">
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Forest</h3>
                                            <h2>700 - 899<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="{{ route('green-score.public') }}" class="theme-btn">
                                            Xem chi tiết
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tích lũy điểm từ hóa đơn
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Theo dõi ví điểm và lịch sử
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tham gia thử thách cộng đồng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Đổi các voucher cao cấp nhất
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Phân tích hành vi & gợi ý AI
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Ưu đãi lãi suất tài chính xanh (1.0%)
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="pricing-box-items active">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Net Zero Hero</h3>
                                            <h2>900 - 1000<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="{{ route('green-score.public') }}" class="theme-btn">
                                            Xem chi tiết
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tất cả quyền lợi cấp Forest
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Ưu đãi tài chính xanh tốt nhất (1.5%)
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Nhận quà tặng hiện vật hàng tháng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Huy hiệu vinh danh Net Zero Hero
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tham gia ban cố vấn cộng đồng xanh
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Hỗ trợ ưu tiên 24/7 trực tiếp
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Đặc quyền đối tác</h3>
                                            <h2>Dành cho Doanh nghiệp</h2>
                                        </div>
                                        <p>Liên kết với Green Credit để đồng hành cùng khách hàng trong hành trình sống xanh.</p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
                                            Liên kết ngay
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Quảng bá thương hiệu sống xanh
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Ghi nhận phát thải giảm thiểu
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tạo chiến dịch voucher độc quyền
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Tiếp cận tệp khách hàng xanh
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Báo cáo phân tích hành vi tiêu dùng
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Xuất dữ liệu báo cáo ESG chuẩn hóa
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Contact Section Start -->
    <section class="cta-contact-form-section fix section-padding bg-cover" style="background-image: url('{{ asset('frontend/assets/img/cta/contact-bg.jpg') }}');">
        <div class="container">
            <div class="cta-contact-form-wrapper">
                <div class="plane-shape">
                    <img src="{{ asset('frontend/assets/img/cta/plane.png') }}" alt="img">
                </div>
                <div class="section-title text-center mb-0">
                    <span class="wow fadeInUp">Green Score của bạn</span>
                    <h2 class="text-white char-animation">Hiểu rõ mức độ sống xanh</h2>
                    <p class="mt-3 text-white  wow fadeInUp" data-wow-delay=".4s">
                        Nhập thông tin của bạn để nhận báo cáo phân tích Green Score cá nhân hóa và các gợi ý hành động xanh phù hợp nhất.
                    </p>
                </div>
                <form action="#">
                    <div class="form-clt wow fadeInUp" data-wow-delay=".3s">
                        <input type="text" name="name" id="website" placeholder="Họ và tên">
                    </div>
                    <div class="form-clt wow fadeInUp" data-wow-delay=".5s">
                        <input type="text" name="name" id="email" placeholder="Địa chỉ Email">
                    </div>
                    <button class="theme-btn wow fadeInUp" type="submit" data-wow-delay=".7s">
                        Kiểm tra ngay
                        <i class="far fa-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Project Section Start -->
    <section class="project-section-3 fix section-padding">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Nghiên cứu & Thực tiễn</span>
                <h2 class="char-animation">Những tác động xanh<br>được ghi nhận minh bạch</h2>
            </div>
            <div class="project-wrapper">
                <div class="project-image-items wow fadeInUp">
                    <img src="{{ asset('frontend/assets/img/project/13.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">QR & Green Points</a></h4>
                        <p>Ghi nhận chính xác hành động tiêu dùng xanh của khách hàng thông qua QR Code hóa đơn.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".2s">
                    <img src="{{ asset('frontend/assets/img/project/14.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Tiêu dùng bền vững</a></h4>
                        <p>Khuyến khích sử dụng sản phẩm thân thiện với môi trường, hạn chế rác thải nhựa một lần.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".4s">
                    <img src="{{ asset('frontend/assets/img/project/15.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Green Wallet</a></h4>
                        <p>Ví điểm thông minh giúp quản lý điểm thưởng tích lũy và thực hiện các giao dịch đổi quà.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".6s">
                    <img src="{{ asset('frontend/assets/img/project/16.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Voucher xanh</a></h4>
                        <p>Mạng lưới voucher đa dạng liên kết từ các đối tác dịch vụ, tiêu dùng và tài chính.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".7s">
                    <img src="{{ asset('frontend/assets/img/project/17.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Net Zero Planner</a></h4>
                        <p>Thiết lập mục tiêu giảm thiểu CO2 hàng tháng và theo dõi tiến trình thực hiện thực tế.</p>
                    </div>
                </div>

                <div class="project-image-items active wow fadeInUp" data-wow-delay=".8s">
                    <img src="{{ asset('frontend/assets/img/project/09.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Phát hiện gian lận</a></h4>
                        <p>Thuật toán giám sát giúp phát hiện các hành vi quét trùng lặp, lạm dụng hệ thống tích điểm.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Start -->
    <section class="testimonial-section fix section-padding" style="background-image: url('{{ asset('frontend/assets/img/testimonial/testimonial-1-bg.jpg') }}');">
        <div class="container">
            <div class="section-title">
                <span class="wow fadeInUp">Ý kiến cộng đồng</span>
                <h2 class="char-animation">Cộng đồng nói gì về Green Credit</h2>
            </div>
            <div class="swiper testimonial-slider-3">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-box-items">
                            <div class="testimonial-box">
                                <div class="star-box-items">
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <img src="{{ asset('frontend/assets/img/testimonial/01.png') }}" alt="img">
                                </div>
                                <p>“Green Credit giúp tôi thay đổi thói quen hàng ngày. Việc mang bình nước cá nhân hay không dùng ống hút nhựa giờ đây trở thành một niềm vui nhỏ khi được tích điểm và đổi các voucher giảm giá đồ uống rất thiết thực.”</p>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                </div>
                                <div class="client-content">
                                    <h3>Nguyễn Minh Anh</h3>
                                    <p>Học sinh</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-box-items">
                            <div class="testimonial-box">
                                <div class="star-box-items">
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <img src="{{ asset('frontend/assets/img/testimonial/01.png') }}" alt="img">
                                </div>
                                <p>“Là một chủ quán cà phê đối tác, Green Credit giúp chúng tôi thu hút thêm lượng lớn khách hàng trẻ có lối sống văn minh, đồng thời định vị thương hiệu thân thiện với môi trường một cách rõ nét.”</p>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/client-info-02.png') }}" alt="img">
                                </div>
                                <div class="client-content">
                                    <h3>Trần Quốc Bảo</h3>
                                    <p>Chủ quán La Xanh Coffee</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-box-items">
                            <div class="testimonial-box">
                                <div class="star-box-items">
                                    <div class="star">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <img src="{{ asset('frontend/assets/img/testimonial/01.png') }}" alt="img">
                                </div>
                                <p>“Hệ thống chấm điểm Green Score rất thú vị! Nó không chỉ là những con số mà thực sự thúc đẩy tôi và gia đình cùng nhau thực hiện các hoạt động bảo vệ môi trường, hướng tới mục tiêu phát thải ròng bằng không.”</p>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/client-info-03.png') }}" alt="img">
                                </div>
                                <div class="client-content">
                                    <h3>Phạm Thu Trang</h3>
                                    <p>Nhân viên văn phòng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Support Section Start -->
    <section class="cta-support-section fix section-padding pt-0 cta-support-bg-style">
        <div class="container">
            <div class="cta-support-wrapper zoom-effect-style" style="background-image: url('{{ asset('frontend/assets/img/cta/cta-support-bg.jpg') }}');">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="cta-support-img wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('frontend/assets/img/cta/cta-left.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <div class="cta-support-content">
                            <div class="section-title text-start">
                                <span class="text-white wow fadeInUp">Hỗ trợ 24/7</span>
                                <h2 class="text-white char-animation">Green Credit đồng hành cùng bạn trên hành trình Net Zero</h2>
                            </div>
                            <p class="cta-support-text wow fadeInUp" data-wow-delay=".4s">Bất kỳ khi nào bạn cần hỗ trợ về quét mã, lỗi ví điểm, hoặc muốn đăng ký hợp tác doanh nghiệp, đội ngũ chăm sóc khách hàng của chúng tôi luôn sẵn sàng đồng hành.</p>
                            <div class="cta-support-box wow fadeInUp" data-wow-delay=".6s">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    Liên hệ ngay
                                    <i class="far fa-arrow-right"></i>
                                </a>
                                <div class="phone-box">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/img/call.svg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <p>Email liên hệ</p>
                                        <h5>{{ \App\Models\SystemSetting::get('site_email', 'support@greencredit.vn') }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Faq Section Start -->
    <section class="faq-section fix section-padding pt-0">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Our FAQs</span>
                <h2 class="char-animation">Câu hỏi thường gặp</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="faq-items style-2">
                        <div class="faq-accordion">
                            <div class="accordion" id="accordion2">
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".2s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1">
                                            1. Làm thế nào để tôi có thể bắt đầu tích lũy Green Points?
                                        </button>
                                    </h5>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Bạn chỉ cần mua sắm tại các cửa hàng đối tác liên kết của Green Credit, thực hiện các hành động sống xanh (như mang bình nước cá nhân, không dùng ly nhựa/ống hút) và quét mã QR in trên hóa đơn để nhận điểm vào ví.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                            2. Green Score là gì và được tính toán như thế nào?
                                        </button>
                                    </h5>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Green Score là chỉ số sống xanh cá nhân được chấm dựa trên 5 khía cạnh cốt lõi: tần suất hành động sống xanh, tính nhất quán hàng tháng, sự đa dạng của các hoạt động bảo vệ môi trường, tính xác thực của hóa đơn đã quét và đóng góp chia sẻ cho cộng đồng.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                            3. Làm cách nào để đổi voucher từ điểm xanh tích lũy?
                                        </button>
                                    </h5>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Bạn có thể truy cập vào Chợ Voucher (Voucher Marketplace) trong ứng dụng, lựa chọn voucher phù hợp với nhu cầu từ các danh mục như Ẩm thực, Di chuyển xanh, Ví điện tử hoặc Ưu đãi tài chính, sau đó nhấn "Đổi ngay" bằng số điểm tương ứng.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".8s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                            4. Tôi là chủ cửa hàng, làm cách nào để liên kết với Green Credit?
                                        </button>
                                    </h5>
                                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Hãy gửi thông tin đăng ký liên kết thông qua trang Liên hệ của chúng tôi. Đội ngũ Green Credit sẽ liên hệ hỗ trợ bạn thiết lập tài khoản chủ cửa hàng, tạo chi nhánh và cấp quyền cho nhân viên để bắt đầu phát hành hóa đơn xanh chứa QR Code tích điểm.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".9s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                            5. Có những cấp độ xanh nào trên nền tảng?
                                        </button>
                                    </h5>
                                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            Green Credit có 5 cấp độ tiến trình sống xanh bao gồm: Cấp Seed (Mầm non), Cấp Leaf (Lá xanh), Cấp Tree (Cây xanh), Cấp Forest (Rừng xanh) và cấp cao nhất là Net Zero Hero. Mỗi cấp độ sẽ được mở khóa khi bạn đạt được số điểm Green Score tương ứng.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section section-padding bg-cover fix" style="background-image: url('{{ asset('frontend/assets/img/contact/01.jpg') }}');">
        <div class="container">
            <div class="contect-wrapper">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-content">
                            <div class="section-title mb-0">
                                <span class="wow fadeInUp">Liên hệ</span>
                                <h2 class="char-animation">Cùng nâng tầm<br>lối sống xanh của bạn</h2>
                            </div>
                            <form action="#" id="contact-form" class="contact-form-box">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                                        <div class="form-clt">
                                            <input type="text" name="name" id="name" placeholder="Họ và tên">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input type="text" name="email" id="email2" placeholder="Địa chỉ Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                        <div class="form-clt">
                                            <input type="text" name="phone" id="phone" placeholder="Số điện thoại">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                        <div class="form-clt">
                                            <input type="text" name="subject" id="subject" placeholder="Tiêu đề">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".8s">
                                        <div class="form-clt">
                                            <textarea name="message" id="message" placeholder="Lời nhắn của bạn..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".9s">
                                        <button type="submit" class="theme-btn">
                                            Liên hệ
                                            <i class="far fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contect-image float-bob-y wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('frontend/assets/img/contact/02.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section Start -->
    <section class="news-section section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Tin tức sống xanh</span>
                <h2 class="char-animation">Kiến thức và cảm hứng sống xanh</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items item_right_1">
                        <div class="news-img">
                            <img src="{{ asset('frontend/assets/img/news/1.png') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-date">
                                <li>
                                    <i class="far fa-calendar-star"></i>
                                    12 Tháng 5, 2026
                                </li>
                                <li>
                                    <i class="far fa-comments"></i>
                                    12 bình luận
                                </li>
                            </ul>
                            <h3><a href="{{ route('news.show', 1) }}">Bắt đầu sống xanh từ những thay đổi nhỏ mỗi ngày</a></h3>
                            <p>Khám phá những bước đi đơn giản nhất để hình thành lối sống bảo vệ môi trường từ thói quen sinh hoạt.</p>
                            <a href="{{ route('news.show', 1) }}" class="link-btn">Xem Chi Tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items">
                        <div class="news-img">
                            <img src="{{ asset('frontend/assets/img/news/2.png') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-date">
                                <li>
                                    <i class="far fa-calendar-star"></i>
                                    15 Tháng 5, 2026
                                </li>
                                <li>
                                    <i class="far fa-comments"></i>
                                    8 bình luận
                                </li>
                            </ul>
                            <h3><a href="{{ route('news.show', 2) }}">Cách Green Score ghi nhận hành vi tiêu dùng bền vững</a></h3>
                            <p>Tìm hiểu chi tiết các khía cạnh đánh giá điểm Green Score và cách hệ thống tự động cập nhật tiến trình của bạn.</p>
                            <a href="{{ route('news.show', 2) }}" class="link-btn">Xem Chi Tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items item_left_1">
                        <div class="news-img">
                            <img src="{{ asset('frontend/assets/img/news/3.png') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <ul class="post-date">
                                <li>
                                    <i class="far fa-calendar-star"></i>
                                    18 Tháng 5, 2026
                                </li>
                                <li>
                                    <i class="far fa-comments"></i>
                                    15 bình luận
                                </li>
                            </ul>
                            <h3><a href="{{ route('news.show', 3) }}">Vai trò của dữ liệu xanh trong hành trình hướng tới Net Zero</a></h3>
                            <p>Hiểu rõ tầm quan trọng của việc thu thập và phân tích dữ liệu tiêu dùng xanh trong nỗ lực cắt giảm carbon quốc gia.</p>
                            <a href="{{ route('news.show', 3) }}" class="link-btn">Xem Chi Tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 wow fadeInUp">
                <a href="{{ route('news.index') }}" class="theme-btn style-2">
                    Xem tất cả tin tức <i class="far fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection
