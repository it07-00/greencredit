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
                        <a href="{{ route('home') }}">Trang chủ</a>
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
                                Thu thập, phân tích và thống kê chính xác lượng rác thải nhựa giảm thiểu, số lít nước tái sử dụng từ hành vi sống xanh của bạn.
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
                            <i class="flaticon-email-marketing-1"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-2.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Green Wallet<br>thông minh</a></h3>
                            <p>
                                Ví tích điểm thưởng Green Points tự động từ việc quét mã QR hóa đơn xanh tại các cửa hàng đối tác liên kết.
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
                                Hệ thống chấm điểm chỉ số sống xanh cá nhân dựa trên 5 khía cạnh khoa học để mở khóa nhiều ưu đãi tài chính đặc quyền.
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
                            <i class="flaticon-email-marketing"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-4.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Voucher xanh<br>hấp dẫn</a></h3>
                            <p>
                                Mạng lưới quà tặng, voucher giảm giá ăn uống, mua sắm và hoàn tiền từ các thương hiệu đồng hành cùng môi trường.
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
                                Xuất báo cáo lượng khí phát thải CO2 giảm thiểu hàng tháng, cung cấp số liệu thực tế đóng góp cho Trái Đất.
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
                            <i class="flaticon-email-marketing-1"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-6.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Gợi ý hành động<br>cá nhân hóa</a></h3>
                            <p>
                                Thuật toán AI gợi ý các thói quen xanh phù hợp nhất với điều kiện sinh hoạt và sở thích cá nhân của bạn.
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
                                Lên kế hoạch và theo dõi tiến trình giảm thiểu dấu chân carbon hướng tới lối sống không phát thải ròng Carbon.
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
                            <i class="flaticon-email-marketing"></i>
                            <div class="icon-bg">
                                <img src="{{ asset('frontend/assets/img/service/icon-bg-8.png') }}" alt="img">
                            </div>
                        </div>
                        <div class="content">
                            <h3><a href="service-details.html">Phát hiện<br>gian lận</a></h3>
                            <p>
                                Cơ chế phát hiện gian lận thông minh ngăn chặn hành vi quét mã hóa đơn giả hoặc trùng lặp, bảo đảm sự công bằng.
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
                                <span class="wow fadeInUp">Tại sao chọn chúng tôi</span>
                                <h2 class="char-animation">Minh bạch dữ liệu, tạo tác động bền vững</h2>
                            </div>
                            <p class="choose-us-text wow fadeInUp" data-wow-delay=".4s">Green Credit mang lại sự minh bạch tuyệt đối và tính hiệu quả vượt trội trong việc ghi nhận, quy đổi các hành động bảo vệ môi trường thành giá trị thực tế.</p>
                            <div class="icon-box-items">
                                <div class="icon-box wow fadeInUp" data-wow-delay=".2s">
                                    <div class="icon">
                                        <i class="flaticon-mission"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Sứ mệnh</h6>
                                        <h5>Chúng tôi không chỉ cung cấp một ứng dụng tích điểm, mà mong muốn kiến tạo một cộng đồng tiêu dùng xanh bền vững.</h5>
                                    </div>
                                </div>
                                <div class="icon-box style-2 wow fadeInUp" data-wow-delay=".4s">
                                    <div class="icon">
                                        <i class="flaticon-vision"></i>
                                    </div>
                                    <div class="content">
                                        <h6>Tầm nhìn</h6>
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
                                        <p>Email liên hệ</p>
                                        <h5>support@greencredit.vn</h5>
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
                        <h2><span class="odometer" data-count="10">00</span>+</h2>
                        <p>Năm kinh nghiệm</p>
                    </div>
                </div>
                <div class="counter-items style-2 wow fadeInUp" data-wow-delay=".4s">
                    <div class="icon">
                        <i class="flaticon-file"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="500">00</span>+</h2>
                        <p>Dự án hoàn thành</p>
                    </div>
                </div>
                <div class="counter-items style-3 wow fadeInUp" data-wow-delay=".6s">
                    <div class="icon">
                        <i class="flaticon-medal"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="50">00</span>+</h2>
                        <p>Giải thưởng</p>
                    </div>
                </div>
                <div class="counter-items style-4 wow fadeInUp" data-wow-delay=".8s">
                    <div class="icon">
                        <i class="flaticon-hire"></i>
                    </div>
                    <div class="content">
                        <h2><span class="odometer" data-count="60">00</span>K+</h2>
                        <p>Người dùng xanh</p>
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
                    Hệ thống cấp độ sống xanh của Green Credit giúp ghi nhận và khuyến khích mọi nỗ lực bảo vệ môi trường, mang lại nhiều quyền lợi thiết thực.
                </p>
                <div class="d-flex justify-content-center mt-3 mt-md-0 wow fadeInUp" data-wow-delay=".4s">
                    <div class="pricing-two__tab">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="pt-1-tab" data-bs-toggle="tab"
                                    data-bs-target="#pt-1" type="button" role="tab" aria-controls="pt-1"
                                    aria-selected="true">Cấp độ cơ bản</button>
                                <button class="nav-link" id="pt-2-tab" data-bs-toggle="tab" data-bs-target="#pt-2"
                                    type="button" role="tab" aria-controls="pt-2" aria-selected="false"
                                    tabindex="-1">Cấp độ nâng cao</button>

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
                                                <i class="far fa-times-circle"></i>
                                                Đổi các voucher cao cấp nhất
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Phân tích hành vi & gợi ý AI
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Ưu đãi lãi suất tài chính xanh
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
                                                Đổi các voucher trung cấp
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Phân tích hành vi & gợi ý AI
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
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
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
                                                Đổi các voucher cao cấp
                                            </li>
                                            <li>
                                                <i class="flaticon-check"></i>
                                                Phân tích hành vi & gợi ý AI
                                            </li>
                                            <li>
                                                <i class="far fa-times-circle"></i>
                                                Ưu đãi lãi suất tài chính xanh
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
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
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
                                        <p>Tích lũy điểm từ hành động xanh và mở khóa các quyền lợi phù hợp với cấp độ của bạn.
                                        </p>
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
                                                Huy badge vinh danh Net Zero Hero
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
                                        <p>Liên kết với Green Credit để đồng hành cùng khách hàng trong hành trình sống xanh.
                                        </p>
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

    <!--Testimonial Section Start -->
    <section class="testimonial-section-6 section-bg-2 section-padding fix">
        <div class="container">
            <div class="section-title-area">
                <div class="section-title">
                    <span class="wow fadeInUp">Ý kiến cộng đồng</span>
                    <h2 class="char-animation">Cảm nhận từ cộng đồng<br>Green Credit</h2>
                </div>
                <p class="wow fadeInUp" data-wow-delay=".2s">Lắng nghe những chia sẻ thực tế từ các thành viên tích cực, các đối tác cửa hàng đã và đang đồng hành cùng Green Credit trên hành trình phủ xanh Việt Nam.</p>
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
                                        <p>“Tôi rất thích tính năng Green Score. Nó giống như một trò chơi thú vị giúp tôi tự giác mang túi vải và hộp đựng cá nhân khi đi mua sắm để được tích điểm.”</p>
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
                                        <p>“Từ khi tích hợp hóa đơn xanh QR Code của Green Credit, cửa hàng của tôi đã giảm đáng kể lượng cốc nhựa dùng một lần và thu hút thêm rất nhiều khách hàng trẻ.”</p>
                                        <div class="client-info">
                                            <div class="client-img">
                                                <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                            </div>
                                            <div class="client-content">
                                                <h3>Trần Quốc Bảo</h3>
                                                <span>Chủ cửa hàng</span>
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
                                        <p>“Hệ thống Voucher xanh rất thiết thực! Số điểm tích lũy được từ việc phân loại rác tại nguồn giúp tôi đổi được nhiều mã giảm giá di chuyển xanh bằng xe điện.”</p>
                                        <div class="client-info">
                                            <div class="client-img">
                                                <img src="{{ asset('frontend/assets/img/testimonial/client-info-01.png') }}" alt="img">
                                            </div>
                                            <div class="client-content">
                                                <h3>Phạm Thu Trang</h3>
                                                <span>Nhân viên văn phòng</span>
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
                                <span class="wow fadeInUp">Câu hỏi thường gặp</span>
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
                <div class="cta-button wow fadeInUp" data-wow-delay=".5s">
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
                        <p><a href="mailto:support@greencredit.vn" class="link">support@greencredit.vn</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
