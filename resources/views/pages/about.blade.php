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
                            <p class="about-text wow fadeInUp" data-wow-delay=".2s">Green Credit tự hào là nền tảng tiên phong đồng hành cùng bạn trong hành trình kiến tạo lối sống bền vững, giảm thiểu phát thải và tích lũy điểm thưởng từ thói quen tiêu dùng có trách nhiệm hàng ngày.</p>
                            <div class="icon-box wow fadeInUp" data-wow-delay=".6s">
                                <div class="icon">
                                    <i class="flaticon-research"></i>
                                </div>
                                <div class="content">
                                    <h3>Đo lường tác động xanh</h3>
                                    <p>Hệ thống tự động quy đổi lượng rác thải nhựa giảm thiểu và lượng CO2 cắt giảm từ hành động của bạn thành số liệu báo cáo trực quan.</p>
                                </div>
                            </div>
                            <div class="icon-box wow fadeInUp" data-wow-delay=".8s">
                                <div class="icon style-2">
                                    <i class="flaticon-online-service"></i>
                                </div>
                                <div class="content">
                                    <h3>Tích lũy Green Points</h3>
                                    <p>Điểm thưởng Green Points tích lũy trong ví có thể dùng để đổi lấy các ưu đãi giá trị từ mạng lưới hàng trăm cửa hàng đối tác.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-feature-wrapper-1 section-padding pb-0">
                <div class="about-feature-box wow fadeInUp" data-wow-delay=".3s">
                    <div class="about-icon">
                        <i class="flaticon-video-marketing-1"></i>
                    </div>
                    <div class="about-content">
                        <h3>Phân tích dữ liệu xanh</h3>
                        <p>Cung cấp báo cáo cá nhân hóa giúp bạn thấu hiểu xu hướng tiêu dùng xanh của bản thân qua từng tháng.</p>
                    </div>
                </div>
                <div class="about-feature-box wow fadeInUp" data-wow-delay=".5s">
                    <div class="about-icon style-2">
                        <i class="flaticon-market-analysis"></i>
                    </div>
                    <div class="about-content">
                        <h3>Xác thực minh bạch</h3>
                        <p>Mọi giao dịch tích điểm đều được đối soát qua QR hóa đơn, đảm bảo tính trung thực và ngăn chặn gian lận.</p>
                    </div>
                </div>
                <div class="about-feature-box wow fadeInUp" data-wow-delay=".7s">
                    <div class="about-icon style-3">
                        <i class="flaticon-presentation"></i>
                    </div>
                    <div class="about-content">
                        <h3>Tăng trưởng bền vững</h3>
                        <p>Đồng hành cùng cộng đồng xây dựng lối sống xanh lâu dài, tạo giá trị thực cho môi trường sống.</p>
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
                                    Đánh giá chính xác mức độ sống xanh của bạn dựa trên 5 khía cạnh khoa học để mở khóa các đặc quyền tài chính xanh.
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
                                    Ghi nhận đa dạng các hoạt động bảo vệ môi trường hàng ngày: không dùng ly nhựa, mang bình cá nhân, đi bộ hoặc xe đạp.
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
                                    Mạng lưới liên kết rộng khắp với các thương hiệu cà phê, siêu thị, nhà hàng thân thiện với môi trường.
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
                                Green Credit cam kết mang lại sự minh bạch tuyệt đối trong việc ghi nhận và báo cáo các chỉ số bảo vệ môi trường cá nhân cũng như doanh nghiệp đối tác, thúc đẩy tiến trình giảm phát thải ròng Carbon.
                            </p>
                            <div class="about-list wow fadeInUp" data-wow-delay=".4s">
                                <ul>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Phân tích Green Score
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Đối tác xanh tin cậy
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Báo cáo tác động tháng
                                    </li>
                                    <li>
                                        <i class="flaticon-check"></i>
                                        Hỗ trợ cộng đồng 24/7
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
                                        <p>Email liên hệ</p>
                                        <h5>support@greencredit.vn</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay=".3s">
                        <div class="about-image">
                            <img src="{{ asset('frontend/assets/img/about/about-05.png') }}" alt="img">
                            <div class="content">
                                <h2><span class="odometer" data-count="15">00</span>+</h2>
                                <p>Chiến dịch xanh</p>
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
                    <span class="wow fadeInUp">Ý kiến cộng đồng</span>
                    <h2 class="char-animation">Cảm nhận từ cộng đồng<br>Green Credit</h2>
                </div>
                <p class="wow fadeInUp" data-wow-delay=".2s">Lắng nghe những chia sẻ thực tế từ các thành viên tích cực, các đối tác cửa hàng đã và đang đồng hành cùng Green Credit trên hành trình phủ xanh Việt Nam.</p>
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
                                            “Việc tích lũy điểm xanh từ thói quen mang túi vải khi đi siêu thị giúp em ý thức hơn về lượng rác thải nhựa phát sinh ra môi trường mỗi ngày.”
                                        </h4>
                                        <div class="clinet-info">
                                            <h3>Trần Thanh Hà</h3>
                                            <p>Học sinh</p>
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
                                            “Giao diện thân thiện, quét QR nhanh chóng và các thử thách sống xanh được cập nhật liên tục rất thu hút và tạo động lực lớn cho tôi.”
                                        </h4>
                                        <div class="clinet-info">
                                            <h3>Lê Hoài Nam</h3>
                                            <p>Kỹ sư phần mềm</p>
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
                                            “Green Credit là cầu nối tuyệt vời giúp tôi vừa bảo vệ môi trường vừa tiết kiệm được khá nhiều chi phí tiêu dùng nhờ hệ thống voucher giảm giá.”
                                        </h4>
                                        <div class="clinet-info">
                                            <h3>Nguyễn Hoàng Dung</h3>
                                            <p>Kinh doanh tự do</p>
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
                <span class="wow fadeInUp">Tin tức sống xanh</span>
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
                                12 Tháng 1, 2026
                            </span>
                            <h3><a href="news-details.html">Cách thiết lập mục tiêu giảm phát thải cá nhân hiệu quả</a></h3>
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
                                15 Tháng 1, 2026
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
                                18 Tháng 1, 2026
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
                                                    1. Làm thế nào để tôi có thể bắt đầu tích lũy Green Points?
                                                </button>
                                            </h5>
                                            <div id="faq1" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Bạn chỉ cần mua sắm tại các cửa hàng đối tác liên kết của Green Credit, thực hiện các hành động sống xanh (như mang bình nước cá nhân, không dùng ly nhựa/ống hút) và quét mã QR in trên hóa đơn để nhận điểm vào ví.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq2"
                                                    aria-expanded="false" aria-controls="faq2">
                                                    2. Green Score là gì và được tính toán như thế nào?
                                                </button>
                                            </h5>
                                            <div id="faq2" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Green Score là chỉ số sống xanh cá nhân được chấm dựa trên 5 khía cạnh cốt lõi: tần suất hành động sống xanh, tính nhất quán hàng tháng, sự đa dạng của các hoạt động bảo vệ môi trường, tính xác thực của hóa đơn đã quét và đóng góp chia sẻ cho cộng đồng.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq3"
                                                    aria-expanded="false" aria-controls="faq3">
                                                    3. Làm cách nào để đổi voucher từ điểm xanh tích lũy?
                                                </button>
                                            </h5>
                                            <div id="faq3" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Bạn có thể truy cập vào Chợ Voucher (Voucher Marketplace) trong ứng dụng, lựa chọn voucher phù hợp với nhu cầu từ các danh mục như Ẩm thực, Di chuyển xanh, Ví điện tử hoặc Ưu đãi tài chính, sau đó nhấn "Đổi ngay" bằng số điểm tương ứng.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item wow fadeInUp" data-wow-delay=".7s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq4"
                                                    aria-expanded="false" aria-controls="faq4">
                                                    4. Tôi là chủ cửa hàng, làm cách nào để liên kết với Green Credit?
                                                </button>
                                            </h5>
                                            <div id="faq4" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
                                                <div class="accordion-body">
                                                    Hãy gửi thông tin đăng ký liên kết thông qua trang Liên hệ của chúng tôi. Đội ngũ Green Credit sẽ liên hệ hỗ trợ bạn thiết lập tài khoản chủ cửa hàng, tạo chi nhánh và cấp quyền cho nhân viên để bắt đầu phát hành hóa đơn xanh chứa QR Code tích điểm.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item mb-0 wow fadeInUp" data-wow-delay=".8s">
                                            <h5 class="accordion-header">
                                                <button class="accordion-button collapsed" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#faq5"
                                                    aria-expanded="false" aria-controls="faq5">
                                                    5. Có những cấp độ xanh nào trên nền tảng?
                                                </button>
                                            </h5>
                                            <div id="faq5" class="accordion-collapse collapse"
                                                data-bs-parent="#accordion">
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
                    <span class="text-white wow fadeInUp">Bắt đầu ngay hôm nay</span>
                    <h2 class="text-white char-animation">
                        Cùng Green Credit<br>kiến tạo tương lai bền vững
                    </h2>
                </div>
                <div class="cta-button wow fadeInUp" data-wow-delay=".9s">
                    <a href="{{ route('contact') }}" class="theme-btn">
                        Liên hệ ngay
                        <i class="far fa-arrow-right"></i>
                    </a>
                    <a href="{{ route('green-score.public') }}" class="pricing-text">Cấp độ xanh <i class="far fa-arrow-right"></i></a>
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
                        <p>Khu Công nghệ cao, Quận 9, TP. HCM</p>
                    </div>
                </div>
                <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                    <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="content">
                        <h3>Hotline hỗ trợ</h3>
                        <p><a href="tel:19001000">1900 1000</a></p>
                    </div>
                </div>
                <div class="icon-items wow fadeInUp" data-wow-delay=".7s">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="content">
                        <h3>Email liên hệ</h3>
                        <p><a href="mailto:support@greencredit.vn">support@greencredit.vn</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
