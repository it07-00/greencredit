@extends('layouts.app')

@section('title', 'Tính năng')
@section('meta_description', 'Khám phá hệ sinh thái Green Credit: QR hóa đơn xanh, Green Wallet, Green Score, voucher và Net Zero Planner.')

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
                        Tính năng                    </li>
                </ul>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Tính năng</h2>
            </div>
        </div>
    </div>
</section>
    <!-- Tính năng Section Start -->
    <section class="service-section-2 section-padding fix">
        <div class="container">
            <div class="section-title text-center">
                <span class="wow fadeInUp">Tính năng</span>
                <h2 class="char-animation">Hệ sinh thái sống xanh<br>trong một nền tảng</h2>
            </div>
            <div class="row g-5">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-seo"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-1.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Phân tích dữ liệu<br>xanh</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-email-tiêu dùng xanh-1"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-2.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Green Wallet<br>thông minh</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-performance"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-3.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Green Score<br>minh bạch</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-email-tiêu dùng xanh"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-4.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Voucher xanh<br>hấp dẫn</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-seo"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-5.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Báo cáo tác động<br>môi trường</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-email-tiêu dùng xanh-1"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-6.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Gợi ý hành động<br>cá nhân hóa</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".6s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-performance"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-7.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Lộ trình<br>Net Zero</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="service-icon-box-items-2">
                        <div class="icon">
                            <i class="flaticon-email-tiêu dùng xanh"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-8.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Phát hiện<br>gian lận</a></h3>
                            <p>
                                Tính năng được thiết kế để ghi nhận chính xác và khuyến khích thói quen tiêu dùng bền vững.
                                for business. Nullam vel accumsan nisi.
                            </p>
                            <a href="service-details.html" class="link-btn">Xem chi tiết
                                <i class="far fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section Start -->
    <section class="choose-us-section section-padding section-bg-2">
        <div class="container">
            <div class="choose-us-wrapper">
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="choose-us-content">
                            <div class="section-title">
                                <span class="wow fadeInUp">Why Choose Us</span>
                                <h2 class="char-animation">Minh bạch dữ liệu, tạo tác động bền vững</h2>
                            </div>
                            <p class="choose-us-text wow fadeInUp" data-wow-delay=".4s">Chào mừng đến Green Credit your trusted
                                partner for comprehensive Green Credit and <br> tiêu dùng bền vững solutions with our proven
                                expertise</p>
                            <div class="icon-box-items">
                                <div class="icon-box wow fadeInUp" data-wow-delay=".2s">
                                    <div class="icon">
                                        <i class="flaticon-mission"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Our Mission</h6>
                                        <h5>We strive to be more than just a service <br> provider; we aim to be trusted
                                            Green Credit</h5>
                                    </div>
                                </div>
                                <div class="icon-box style-2 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon">
                                        <i class="flaticon-vision"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Our Vision</h6>
                                        <h5>Mỗi người dùng và doanh nghiệp đều có thể<br>đo lường, cải thiện tác động môi trường của mình.
                                        </h5>
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
                        <div class="choose-us-img wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('frontend/assets/img/choose-us/choose-us.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Counter Section Start -->
    <section class="counter-section section-padding section-bg-2 pt-0">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
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
                                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".7s">
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
    <section class="testimonial-section-6 section-bg-2 section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Our Testimonial</span>
                    <h2 class="char-animation">Cảm nhận từ cộng đồng<br>Green Credit</h2>
                </div>
                <p class="wow fadeInUp" data-wow-delay=".2s">Walleye poolfish sand goby butterfly ray stream catfish
                    jewfish spanish.<br> Stream catfish jewfish spanish ballan wrasse climbing gourami amur pike <br>
                    arctic char steelhead sprat sea lamprey grunion.</p>
            </div>
            <div class="testimonial-wrapper-6">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-4 wow fadeInUp" data-wow-delay=".4s">
                        <div class="testimonial-left-items">
                            <div class="testimonial-content">
                                <h2>4.9</h2>
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5>88 đánh giá</h5>
                                <h4>Trải nghiệm thực tế từ cộng đồng sống xanh</h4>
                            </div>
                            <div class="client-info">
                                <div class="client-img">
                                    <img src="{{ asset('frontend/assets/img/testimonial/testimonial-6-01.png') }}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="swiper testimonial-slider-4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-box-6">
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
                                        <p>“Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget
                                            elementum lobortis ante massa quis dui suspendisse massa. Curabitur
                                            condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante
                                            cursus.”</p>
                                        <div class="client-info">
                                            <div class="client-img">
                                                <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                            </div>
                                            <div class="client-content">
                                                <h3>Nguyễn Minh Anh</h3>
                                                <span>Digital Marketer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-6">
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
                                        <p>“Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget
                                            elementum lobortis ante massa quis dui suspendisse massa. Curabitur
                                            condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante
                                            cursus.”</p>
                                        <div class="client-info">
                                            <div class="client-img">
                                                <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                            </div>
                                            <div class="client-content">
                                                <h3>Nguyễn Minh Anh</h3>
                                                <span>Digital Marketer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box-6">
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
                                        <p>“Etiam viverra purus sed aliquet tincidunt diam auctor nibhe eget eget
                                            elementum lobortis ante massa quis dui suspendisse massa. Curabitur
                                            condimentum accumsan risus et porta nam ut nisi metus. Praesent orci ante
                                            cursus.”</p>
                                        <div class="client-info">
                                            <div class="client-img">
                                                <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                            </div>
                                            <div class="client-content">
                                                <h3>Nguyễn Minh Anh</h3>
                                                <span>Digital Marketer</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-dot3">
                                <div class="dot"></div>
                            </div>
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
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="faq-image style-2">
                            <img src="{{ asset('frontend/assets/img/faq-2.png') }}" alt="img">
                        </div>
                    </div>
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
                <div class="cta-button wow fadeInUp" data-wow-delay=".5s">
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
                        <p><a href="mailto:info@example.com" class="link">info@example.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
