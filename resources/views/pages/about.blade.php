@extends('layouts.app')

@section('title', 'Giới thiệu')
@section('meta_description', 'Tìm hiểu sứ mệnh, mô hình hoạt động và tác động bền vững của nền tảng Green Credit.')

@section('content')
<!-- Breadcrumb-section Start -->
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="page-heading">
                <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <i class="fal fa-long-arrow-right"></i>
                    </li>
                    <li>
                        Về Green Credit                    </li>
                </ul>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Về Green Credit</h2>
            </div>
        </div>
    </div>
</section>
    <!-- About Section Start -->
    <section class="about-section-2 section-padding fix">
        <div class="plane-shape">
            <img src="{{ asset('frontend/assets/img/about/plane-shape.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="about-wrapper-2 m-0">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-img">
                            <img src="{{ asset('frontend/assets/img/about/about-2-01.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title mb-0 text-start">
                                <span class="wow fadeInUp">Chào mừng đến Green Credit</span>
                                <h2 class="char-animation">Kết nối cộng đồng<br>bằng hành động xanh</h2>
                            </div>
                            <p class="about-text wow fadeInUp" data-wow-delay=".2s">Chào mừng đến Green Credit your trusted partner
                                for comprehensive Green Credit and tiêu dùng bền vững solutions with our proven expertise</p>
                            <div class="icon-box wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon">
                                    <i class="flaticon-research"></i>
                                </div>
                                <div class="content">
                                    <h3>Đo lường tác động xanh</h3>
                                    <p>Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững
                                        solutions.</p>
                                </div>
                            </div>
                            <div class="icon-box wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon style-2">
                                    <i class="flaticon-online-service"></i>
                                </div>
                                <div class="content">
                                    <h3>Đo lường tác động xanh</h3>
                                    <p>Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững
                                        solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-feature-wrapper-1 section-padding pb-0">
                <div class="about-feature-box wow fadeInUp" data-wow-delay=".3s">
                    <div class="about-icon">
                        <i class="flaticon-video-tiêu dùng xanh-1"></i>
                    </div>
                    <div class="about-content">
                        <h3>Phân tích dữ liệu xanh</h3>
                        <p>Mauris sem ante, iaculis eget nisl placerat hendrerit. Suspendisse velit for</p>
                    </div>
                </div>
                <div class="about-feature-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="about-icon style-2">
                        <i class="flaticon-market-analysis"></i>
                    </div>
                    <div class="about-content">
                        <h3>Xác thực minh bạch</h3>
                        <p>Mauris sem ante, iaculis eget nisl placerat hendrerit. Suspendisse velit for</p>
                    </div>
                </div>
                <div class="about-feature-box wow fadeInUp" data-wow-delay=".7s">
                    <div class="about-icon style-3">
                        <i class="flaticon-presentation"></i>
                    </div>
                    <div class="about-content">
                        <h3>Tăng trưởng bền vững</h3>
                        <p>Mauris sem ante, iaculis eget nisl placerat hendrerit. Suspendisse velit for</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Section Start -->
    <section class="project-section-4 fix section-padding section-bg-2">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Báo cáo tác động Green Credit</span>
                <h2 class="char-animation">
                    Những tác động xanh<br>được ghi nhận minh bạch
                </h2>
            </div>
            <div class="project-wrapper-4">
                <div class="row justify-content-center">
                    <div class="col-lg-7 wow fadeInUp" data-wow-delay=".3s">
                        <div class="project-box-5 style-1">
                            <div class="content">
                                <h3><a href="project-details.html">Green Score</a></h3>
                                <p>
                                    A progressive automatic dialer makes one call after another with a predefined time
                                    gap in between each, so the agent can easily manage calls
                                </p>
                                <a href="service-details.html" class="link-btn">Xem chi tiết
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('frontend/assets/img/project/10.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 wow fadeInUp" data-wow-delay=".5s">
                        <div class="project-box-5 style-2">
                            <div class="content">
                                <h3><a href="project-details.html">Hành động xanh đa dạng </a></h3>
                                <p>
                                    We pride ourselves on delivering a value proposition that goes beyond expectations.
                                </p>
                                <a href="service-details.html" class="link-btn">Xem chi tiết
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('frontend/assets/img/project/11.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".7s">
                        <div class="project-box-5 style-3">
                            <div class="content">
                                <h3><a href="project-details.html">Kết nối cửa hàng đối tác</a></h3>
                                <p>
                                    A progressive automatic dialer makes one call after another with a predefined time
                                    gap in between each, so the agent can easily manage calls
                                </p>
                                <a href="service-details.html" class="link-btn">Xem chi tiết
                                    <i class="far fa-arrow-right"></i>
                                </a>
                            </div>
                            <div class="image">
                                <img src="{{ asset('frontend/assets/img/project/12.jpg') }}" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section Start -->
    <section class="about-section-5 fix section-padding">
        <div class="container">
            <div class="about-wrapper-5">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="about-content">
                            <div class="section-title mb-0">
                                <span class="wow fadeInUp">Về Green Credit</span>
                                <h2 class="char-animation">
                                    Minh bạch dữ liệu, tạo tác động bền vững
                                </h2>
                            </div>
                            <p class="about-text wow fadeInUp" data-wow-delay=".2s">
                                Walleye poolfish sand goby butterfly ray stream catfish jewfish spanish. Stream catfish
                                jewfish spanish ballan wrasse climbing gourami amu.
                            </p>
                            <div class="about-list wow fadeInUp" data-wow-delay=".4s">
                                <ul>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Phân tích Green Score
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Location based market
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Monthly Reports
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        24/7 Customer Tính năng
                                    </li>
                                </ul>
                            </div>
                            <div class="client-info wow fadeInUp" data-wow-delay=".6s">
                                <img src="{{ asset('frontend/assets/img/hero/client-info.png') }}" alt="img">
                                <img src="{{ asset('frontend/assets/img/hero/client-info-letter.png') }}" alt="img">
                            </div>
                            <div class="choose-us-card wow fadeInUp" data-wow-delay=".8s">
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
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-image">
                            <img src="{{ asset('frontend/assets/img/about/about-05.png') }}" alt="img">
                            <div class="content">
                                <h2><span class="odometer" data-count="26">00</span>+</h2>
                                <p>Years Experience</p>
                                <div class="star">
                                    <img src="{{ asset('frontend/assets/img/about/star-box.png') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- brand Section Start -->
    <div class="brand-section section-padding pt-0">
        <div class="container">
            <div class="section-title text-center mb-4">
                <p class="text-color char-animation">Green Credit kết nối hơn <span>350+</span> cửa hàng đối tác
                </p>
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
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/03.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/04.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/05.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/06.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/07.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/08.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/09.png') }}" alt="img">
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 wow fadeInUp" data-wow-delay=".9s">
                    <div class="brand-img">
                        <img src="{{ asset('frontend/assets/img/brand/10.png') }}" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- pricing Section Start -->
    <section class="pricing-section section-padding" style="background-image: url('{{ asset('frontend/assets/img/pricing-bg.jpg') }}');">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Hệ thống cấp độ xanh</span>
                <h2 class="char-animation">Nâng hạng Green Score, mở khóa thêm quyền lợi</h2>
                <p class="mt-3 wow fadeInUp" data-wow-delay=".2s">
                    Chào mừng đến Green Credit your trusted partner for comprehensive Green Credit and tiêu dùng bền vững solutions. With
                    <br> our proven expertise and innovative strategies the digital landscape.
                </p>
                <div class="d-flex justify-content-center mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".4s">
                    <div class="pricing-two__tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="pt-1-tab" data-bs-toggle="tab"
                                    data-bs-target="#pt-1" type="button" role="tab" aria-controls="pt-1"
                                    aria-selected="true">Monthly</button>
                                <button class="nav-link" id="pt-2-tab" data-bs-toggle="tab" data-bs-target="#pt-2"
                                    type="button" role="tab" aria-controls="pt-2" aria-selected="false"
                                    tabindex="-1">Yearly</button>

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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Seed</h3>
                                            <h2>0 - 199<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
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
                                    <div class="pricing-box-items active">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Leaf</h3>
                                            <h2>200 - 399<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".9s">
                                    <div class="pricing-box-items">
                                        <div class="pricing-header">
                                            <h3>Cấp độ Seed</h3>
                                            <h2>0 - 199<sub> điểm</sub></h2>
                                        </div>
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
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
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
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
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
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
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
                                        <a href="{{ route('contact') }}" class="theme-btn">
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

    <!--Testimonial Section Start -->
    <section class="testimonial-section-5 section-padding fix">
        <div class="testimonial-shape-1">
            <img src="{{ asset('frontend/assets/img/testimonial/shape-01.png') }}" alt="img">
        </div>
        <div class="testimonial-shape-2">
            <img src="{{ asset('frontend/assets/img/testimonial/shape-02.png') }}" alt="img">
        </div>
        <div class="testimonial-shape-3">
            <img src="{{ asset('frontend/assets/img/testimonial/shape-03.png') }}" alt="img">
        </div>
        <div class="testimonial-shape-4">
            <img src="{{ asset('frontend/assets/img/testimonial/shape-04.png') }}" alt="img">
        </div>
        <div class="container">
            <div class="array-button">
                <button class="array-prev"><i class="far fa-arrow-left"></i></button>
                <button class="array-next"><i class="far fa-arrow-right"></i></button>
            </div>
            <div class="section-title-area text-center text-lg-start">
                <div class="section-title">
                    <span class="wow fadeInUp">Our Testimonial</span>
                    <h2 class="char-animation">Cảm nhận từ cộng đồng<br>Green Credit</h2>
                </div>
                <p class="wow fadeInUp" data-wow-delay=".2s">Walleye poolfish sand goby butterfly ray stream catfish
                    jewfish spanish.<br> Stream catfish jewfish spanish ballan wrasse climbing gourami amur pike <br>
                    arctic char steelhead sprat sea lamprey grunion.</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="swiper testimonial-slider-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-box-5">
                                    <div class="testimonial-icon">
                                        <img src="{{ asset('frontend/assets/img/testimonial/testimonial-details-01.png') }}" alt="img">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4>
                                            “Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget
                                            elementum lobortis ante massa quis dui suspendisse massa. Curabitur
                                            condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante
                                            cursus.”
                                        </h4>
                                        <div class="clinet-info">
                                            <h3>Trần Thanh Hà</h3>
                                            <p>Digital Marketer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-box-5">
                                    <div class="testimonial-icon">
                                        <img src="{{ asset('frontend/assets/img/testimonial/testimonial-details-01.png') }}" alt="img">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4>
                                            “Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget
                                            elementum lobortis ante massa quis dui suspendisse massa. Curabitur
                                            condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante
                                            cursus.”
                                        </h4>
                                        <div class="clinet-info">
                                            <h3>Trần Thanh Hà</h3>
                                            <p>Digital Marketer</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-box-5">
                                    <div class="testimonial-icon">
                                        <img src="{{ asset('frontend/assets/img/testimonial/testimonial-details-01.png') }}" alt="img">
                                    </div>
                                    <div class="testimonial-content">
                                        <h4>
                                            “Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget
                                            elementum lobortis ante massa quis dui suspendisse massa. Curabitur
                                            condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante
                                            cursus.”
                                        </h4>
                                        <div class="clinet-info">
                                            <h3>Trần Thanh Hà</h3>
                                            <p>Digital Marketer</p>
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

    <!-- News Section Start -->
    <section class="news-section-2 section-padding section-bg-2 fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Our News</span>
                <h2 class="char-animation">Kiến thức và cảm hứng sống xanh</h2>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 item_right_1">
                    <div class="news-box-items-2">
                        <div class="news-img">
                            <img src="{{ asset('frontend/assets/img/news/home-2-04.jpg') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <span class="data-list">
                                <i class="fas fa-calendar"></i>
                                12 JANUARY, 2026
                            </span>
                            <h3><a href="news-details.html">Getting Ready to Chase Google Sitelinks for This Next
                                    Code</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="news-box-items-2">
                        <div class="news-img">
                            <img src="{{ asset('frontend/assets/img/news/home-2-05.jpg') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <span class="data-list">
                                <i class="fas fa-calendar"></i>
                                12 JANUARY, 2026
                            </span>
                            <h3><a href="news-details.html">Những công cụ giúp duy trì thói quen sống xanh trong năm 2026</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 item_left_1">
                    <div class="news-box-items-2">
                        <div class="news-img">
                            <img src="{{ asset('frontend/assets/img/news/home-2-06.jpg') }}" alt="img">
                        </div>
                        <div class="news-content">
                            <span class="data-list">
                                <i class="fas fa-calendar"></i>
                                12 JANUARY, 2026
                            </span>
                            <h3><a href="news-details.html">Vai trò của dữ liệu xanh trong hành trình hướng tới Net Zero</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Faq Section Start -->
    <section class="faq-section-3 fix section-padding">
        <div class="container">
            <div class="faq-wrapper-3">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="faq-content">
                            <div class="section-title mb-5">
                                <span class="wow fadeInUp">Our FAQs</span>
                                <h2 class="char-animation">Câu hỏi thường gặp</h2>
                            </div>
                            <div class="faq-items style-2">
                                <div class="faq-accordion">
                                    <div class="accordion" id="accordion2">
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".2s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq1"
                                                    aria-expanded="true" aria-controls="faq1">
                                                    How do I book a trip?
                                                </button>
                                            </h5>
                                            <div id="faq1" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    The time it will take for your website's search engine rankings to
                                                    begin improving depends on several of its characteristics prior to
                                                    optimization. Older websites, with diverse backlink portfolios and
                                                    more trust from search engines
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq2"
                                                    aria-expanded="false" aria-controls="faq2">
                                                    Can I customize my itinerary?
                                                </button>
                                            </h5>
                                            <div id="faq2" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    The time it will take for your website's search engine rankings to
                                                    begin improving depends on several of its characteristics prior to
                                                    optimization. Older websites, with diverse backlink portfolios and
                                                    more trust from search engines
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq3"
                                                    aria-expanded="false" aria-controls="faq3">
                                                    Is travel insurance included in the package?
                                                </button>
                                            </h5>
                                            <div id="faq3" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    The time it will take for your website's search engine rankings to
                                                    begin improving depends on several of its characteristics prior to
                                                    optimization. Older websites, with diverse backlink portfolios and
                                                    more trust from search engines
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".7s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq4"
                                                    aria-expanded="false" aria-controls="faq4">
                                                    How do I make changes to my booking?
                                                </button>
                                            </h5>
                                            <div id="faq4" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    The time it will take for your website's search engine rankings to
                                                    begin improving depends on several of its characteristics prior to
                                                    optimization. Older websites, with diverse backlink portfolios and
                                                    more trust from search engines
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".8s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq5"
                                                    aria-expanded="false" aria-controls="faq5">
                                                    What’s included in my travel package?
                                                </button>
                                            </h5>
                                            <div id="faq5" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    The time it will take for your website's search engine rankings to
                                                    begin improving depends on several of its characteristics prior to
                                                    optimization. Older websites, with diverse backlink portfolios and
                                                    more trust from search engines
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="faq-image">
                            <img src="{{ asset('frontend/assets/img/faq-2.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cta Call Section Start -->
    <section class="cta-call-section-5 section-padding bg-cover"
        style="background-image: url('{{ asset('frontend/assets/img/cta-call.jpg') }}');">
        <div class="container">
            <div class="cta-call-wrapper style-padding">
                <div class="section-title text-center mb-0">
                    <span class="text-white wow fadeInUp">No time to wait ? Call us </span>
                    <h2 class="text-white char-animation">
                        Cùng Green Credit<br>kiến tạo tương lai bền vững
                    </h2>
                </div>
                <div class="cta-button wow fadeInUp" data-wow-delay=".9s">
                    <a href="faq.html" class="theme-btn">
                        Request a Demo
                        <i class="far fa-arrow-right"></i>
                    </a>
                    <a href="pricing.html" class="pricing-text">Cấp độ xanh <i class="far fa-arrow-right"></i></a>
                </div>
                <div class="carton-shape float-bob-x">
                    <img src="{{ asset('frontend/assets/img/cta/carton.png') }}" alt="img">
                </div>
                <div class="book-shape float-bob-y">
                    <img src="{{ asset('frontend/assets/img/cta/book-shape.png') }}" alt="img">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Info Section Start -->
    <div class="contact-info-inner">
        <div class="container">
            <div class="contact-info-inner-wrapper">
                <div class="icon-items wow fadeInUp" data-wow-delay=".3s">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="content">
                        <h3>TP. Hồ Chí Minh</h3>
                        <p>27 Division 10002 Main road</p>
                    </div>
                </div>
                <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                    <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="content">
                        <h3>Hotline</h3>
                        <p><a href="tel:+00479394888">+00 (47) 939 4888</a></p>
                    </div>
                </div>
                <div class="icon-items wow fadeInUp" data-wow-delay=".7s">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="content">
                        <h3>Hotline</h3>
                        <p>27 Division 10002 Main road</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
