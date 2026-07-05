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
                            <i class="flaticon-video-tiêu dùng xanh-1"></i>
                        </div>
                        <div class="service-content">
                            <h3><a href="service-details.html">Green Wallet</a></h3>
                            <p>Ghi nhận hành động xanh<br>nhanh chóng và minh bạch.</p>
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
                            <p>Ghi nhận hành động xanh<br>nhanh chóng và minh bạch.</p>
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
                            <p>Ghi nhận hành động xanh<br>nhanh chóng và minh bạch.</p>
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
                            <p class="about-text wow fadeInUp" data-wow-delay=".4s">Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững solutions with our proven expertise</p>
                            <div class="icon-items wow fadeInUp" data-wow-delay=".2s">
                                <div class="icon">
                                    <i class="flaticon-pie-chart"></i>
                                </div>
                                <div class="content">
                                    <h3>Đổi voucher xanh</h3>
                                    <p>Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững solutions.</p>
                                </div>
                            </div>
                            <ul class="list-items wow fadeInUp" data-wow-delay=".4s">
                                <li>
                                    <i class="flaticon-check"></i>
                                    Competitive online business, the higher the position
                                </li>
                                <li>
                                    <i class="flaticon-check"></i>
                                    Identify converted customers who reached your business
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
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations. Our approach is centered on understanding.</p>
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
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations. Our approach is centered on understanding.</p>
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
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations. Our approach is centered on understanding.</p>
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
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations. Our approach is centered on understanding.</p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- brand Section Start -->
    <div class="brand-section fix section-padding pt-0" style="background-image: url('{{ asset('frontend/assets/img/service/service-bg.jpg') }}');">
        <div class="container">
            <div class="section-title text-center mb-4 wow fadeInUp">
                <p class="char-animation">Green Credit kết nối hơn <span>350+</span> cửa hàng đối tác</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/01.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/02.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/03.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/04.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/05.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/06.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/07.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/08.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/09.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/10.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us Section Start -->
    <section class="choose-us-section fix section-padding">
        <div class="container">
            <div class="choose-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="choose-us-content">
                            <div class="section-title">
                                <span class="wow fadeInUp">Why Choose Us</span>
                                <h2 class="char-animation">Minh bạch dữ liệu, tạo tác động bền vững</h2>
                            </div>
                            <p class="choose-us-text wow fadeInUp" data-wow-delay=".4s">Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and <br> tiêu dùng bền vững solutions with our proven expertise</p>
                            <div class="icon-box-items">
                                <div class="icon-box wow fadeInUp" data-wow-delay=".2s">
                                    <div class="icon">
                                        <i class="flaticon-mission"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Our Mission</h6>
                                        <h5>Chúng tôi không chỉ cung cấp điểm thưởng<br>mà còn xây dựng một cộng đồng sống xanh đáng tin cậy.</h5>
                                    </div>
                                </div>
                                <div class="icon-box style-2 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon">
                                        <i class="flaticon-vision"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Our Vision</h6>
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
                                        <p>Mail Us</p>
                                        <h5>(704) 555-0127</h5>
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
                        <h2><span class="odometer" data-count="45">00</span>+</h2>
                        <p>Industry Experience</p>
                    </div>
                </div>
                <div class="counter-items style-2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="flaticon-file"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="568">00</span>+</h2>
                        <p>Project Completed</p>
                    </div>
                </div>
                <div class="counter-items style-3 wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="flaticon-medal"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="73">00</span>+</h2>
                        <p>Awards Wined</p>
                    </div>
                </div>
                <div class="counter-items style-4 wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="flaticon-hire"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="67">00</span>K</h2>
                        <p>Global Clients</p>
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
                    Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững solutions. With <br> our proven expertise and innovative strategies the digital landscape.
                </p>
                <div class="d-flex justify-content-center mt-3 mt-md-0">
                    <div class="pricing-two__tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="pt-1-tab" data-bs-toggle="tab" data-bs-target="#pt-1" type="button" role="tab" aria-controls="pt-1" aria-selected="true">Monthly</button>
                                <button class="nav-link" id="pt-2-tab" data-bs-toggle="tab" data-bs-target="#pt-2" type="button" role="tab" aria-controls="pt-2" aria-selected="false" tabindex="-1">Yearly</button>

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
                                        <a href="pricing.html" class="theme-btn">
                                            Join This Plan
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Website Auditing
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Error Fix of the Website for Needs
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Keyword Research & Analysis
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Power Link Building
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Complete One-Page Optimization
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                24/7 Our online support
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
                                        <a href="pricing.html" class="theme-btn">
                                            Join This Plan
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Website Auditing
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Error Fix of the Website for Needs
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Keyword Research & Analysis
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Power Link Building
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Complete One-Page Optimization
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                24/7 Our online support
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Seed</h3>
                                            <h2>0 - 199<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="pricing.html" class="theme-btn">
                                            Join This Plan
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Website Auditing
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Error Fix of the Website for Needs
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Keyword Research & Analysis
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Power Link Building
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Complete One-Page Optimization
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                24/7 Our online support
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
                                            <h3>Cấp độ Seed</h3>
                                            <h2>0 - 199<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="pricing.html" class="theme-btn">
                                            Join This Plan
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Website Auditing
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Error Fix of the Website for Needs
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Keyword Research & Analysis
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Power Link Building
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Complete One-Page Optimization
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                24/7 Our online support
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="pricing-box-items active">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Leaf</h3>
                                            <h2>200 - 399<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="pricing.html" class="theme-btn">
                                            Join This Plan
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Website Auditing
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Error Fix of the Website for Needs
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Keyword Research & Analysis
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Power Link Building
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Complete One-Page Optimization
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                24/7 Our online support
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-6">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Seed</h3>
                                            <h2>0 - 199<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.</p>
                                        <a href="pricing.html" class="theme-btn">
                                            Join This Plan
                                            <i class="far fa-arrow-right"></i>
                                        </a>
                                        <ul class="pricing-list">
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Complete Website Auditing
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Error Fix of the Website for Needs
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Keyword Research & Analysis
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Power Link Building
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Complete One-Page Optimization
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                24/7 Our online support
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
                        Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and digital <br> tiêu dùng xanh solutions. With our proven expertise.
                    </p>
                </div>
                <form action="#">
                    <div class="form-clt wow fadeInUp" data-wow-delay=".3s">
                        <input type="text" name="name" id="website" placeholder="Website URL">
                    </div>
                    <div class="form-clt wow fadeInUp" data-wow-delay=".5s">
                        <input type="text" name="name" id="email" placeholder="Email Address">
                    </div>
                    <button class="theme-btn wow fadeInUp" type="submit" data-wow-delay=".7s">
                        Check Now
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
                <span class="wow fadeInUp">Our Case Study</span>
                <h2 class="char-animation">Những tác động xanh<br>được ghi nhận minh bạch</h2>
            </div>
            <div class="project-wrapper">
                <div class="project-image-items wow fadeInUp">
                    <img src="{{ asset('frontend/assets/img/project/13.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">QR & Green Points</a></h4>
                        <p>Comprehensive Green Credit and tiêu dùng bền vững solutions for your needs strategies.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".2s">
                    <img src="{{ asset('frontend/assets/img/project/14.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Tiêu dùng bền vững</a></h4>
                        <p>Comprehensive Green Credit and tiêu dùng bền vững solutions for your needs strategies.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".4s">
                    <img src="{{ asset('frontend/assets/img/project/15.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Green Wallet</a></h4>
                        <p>Comprehensive Green Credit and tiêu dùng bền vững solutions for your needs strategies.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".6s">
                    <img src="{{ asset('frontend/assets/img/project/16.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Voucher xanh</a></h4>
                        <p>Comprehensive Green Credit and tiêu dùng bền vững solutions for your needs strategies.</p>
                    </div>
                </div>
                <div class="project-image-items wow fadeInUp" data-wow-delay=".7s">
                    <img src="{{ asset('frontend/assets/img/project/17.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Net Zero Planner</a></h4>
                        <p>Comprehensive Green Credit and tiêu dùng bền vững solutions for your needs strategies.</p>
                    </div>
                </div>

                <div class="project-image-items active wow fadeInUp" data-wow-delay=".8s">
                    <img src="{{ asset('frontend/assets/img/project/09.jpg') }}" alt="img">

                    <div class="content">
                        <h4><a href="project-details.html">Phát hiện gian lận</a></h4>
                        <p>Comprehensive Green Credit and tiêu dùng bền vững solutions for your needs strategies.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section Start -->
    <section class="testimonial-section fix section-padding" style="background-image: url('{{ asset('frontend/assets/img/testimonial/testimonial-1-bg.jpg') }}');">
        <div class="container">
            <div class="section-title">
                <span class="wow fadeInUp">Our Testimonial</span>
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
                                <p>“Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget elementum lobortis ante massa quis dui suspendisse massa. Curabitur condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante cursus.”</p>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                </div>
                                <div class="client-content">
                                    <h3>Nguyễn Minh Anh</h3>
                                    <p>Digital Marketer</p>
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
                                <p>“Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget elementum lobortis ante massa quis dui suspendisse massa. Curabitur condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante cursus.”</p>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/client-info-02.png') }}" alt="img">
                                </div>
                                <div class="client-content">
                                    <h3>Nguyễn Minh Anh</h3>
                                    <p>Digital Marketer</p>
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
                                <p>“Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget elementum lobortis ante massa quis dui suspendisse massa. Curabitur condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante cursus.”</p>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/client-info-03.png') }}" alt="img">
                                </div>
                                <div class="client-content">
                                    <h3>Nguyễn Minh Anh</h3>
                                    <p>Digital Marketer</p>
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
                                <span class="text-white wow fadeInUp">24/7 Support</span>
                                <h2 class="text-white char-animation">Green Credit đồng hành cùng bạn trên hành trình Net Zero</h2>
                            </div>
                            <p class="cta-support-text wow fadeInUp" data-wow-delay=".4s">Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững solutions with our proven expertise</p>
                            <div class="cta-support-box wow fadeInUp" data-wow-delay=".6s">
                                <a href="{{ route('contact') }}" class="theme-btn">
                                    Liên hệ
                                    <i class="far fa-arrow-right"></i>
                                </a>
                                <div class="phone-box">
                                    <div class="icon">
                                        <img src="{{ asset('frontend/assets/img/call.svg') }}" alt="img">
                                    </div>
                                    <div class="content">
                                        <p>Mail Us</p>
                                        <h5>(704) 555-0127</h5>
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
                                            1. How long will it take before I see better rankings in google?
                                        </button>
                                    </h5>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            The time it will take for your website's search engine rankings to begin improving depends on several of its characteristics prior to optimization. Older websites, with diverse backlink portfolios and more trust from search engines
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2">
                                            2. How long do search engine results last?
                                        </button>
                                    </h5>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            The time it will take for your website's search engine rankings to begin improving depends on several of its characteristics prior to optimization. Older websites, with diverse backlink portfolios and more trust from search engines
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3">
                                            Is travel insurance included in the package?
                                        </button>
                                    </h5>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            The time it will take for your website's search engine rankings to begin improving depends on several of its characteristics prior to optimization. Older websites, with diverse backlink portfolios and more trust from search engines
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item wow fadeInUp" data-wow-delay=".8s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4">
                                            4. Why should I choose Springboard Green Credit?
                                        </button>
                                    </h5>
                                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            The time it will take for your website's search engine rankings to begin improving depends on several of its characteristics prior to optimization. Older websites, with diverse backlink portfolios and more trust from search engines
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".9s">
                                    <h5 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5">
                                            5. How much does search engine optimization cost?
                                        </button>
                                    </h5>
                                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordion">
                                        <div class="accordion-body">
                                            The time it will take for your website's search engine rankings to begin improving depends on several of its characteristics prior to optimization. Older websites, with diverse backlink portfolios and more trust from search engines
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
                                            <input type="text" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                        <div class="form-clt">
                                            <input type="text" name="email" id="email2" placeholder="Email address">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                                        <div class="form-clt">
                                            <input type="text" name="phone" id="phone" placeholder="Phone number">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
                                        <div class="form-clt">
                                            <input type="text" name="subject" id="subject" placeholder="Your subject">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".8s">
                                        <div class="form-clt">
                                            <textarea name="message" id="message" placeholder="Write a message..."></textarea>
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
                <span class="wow fadeInUp">Our News</span>
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
                                    12 May, 2025
                                </li>
                                <li>
                                    <i class="far fa-comments"></i>
                                    23 Comments
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Bắt đầu sống xanh từ những thay đổi nhỏ mỗi ngày</a></h3>
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations.</p>
                            <a href="news-details.html" class="link-btn">Xem chi tiết
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
                                    12 May, 2025
                                </li>
                                <li>
                                    <i class="far fa-comments"></i>
                                    23 Comments
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Cách Green Score ghi nhận hành vi tiêu dùng bền vững</a></h3>
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations.</p>
                            <a href="news-details.html" class="link-btn">Xem chi tiết
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
                                    12 May, 2025
                                </li>
                                <li>
                                    <i class="far fa-comments"></i>
                                    23 Comments
                                </li>
                            </ul>
                            <h3><a href="news-details.html">Vai trò của dữ liệu xanh trong hành trình hướng tới Net Zero</a></h3>
                            <p>We pride ourselves on delivering a value proposition that goes beyond expectations.</p>
                            <a href="news-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
