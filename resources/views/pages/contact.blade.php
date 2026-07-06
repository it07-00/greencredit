@extends('layouts.app')

@section('title', 'Liên hệ')
@section('meta_description', 'Liên hệ Green Credit để được hỗ trợ người dùng, cửa hàng đối tác và chương trình voucher xanh.')

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
                        Liên hệ                    </li>
                </ul>
                <h2 class="wow fadeInUp" data-wow-delay=".3s">Liên hệ</h2>
            </div>
        </div>
    </div>
</section>
    <!--Contact Section Start -->
    <section class="contact-inner-section section-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay=".3s">
                    <div class="contact-box-items">
                        <div class="contact-title">
                            <h3 class="">Văn phòng TP. Hồ Chí Minh</h3>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <div class="icon">
                                    <i class="fas fa-comment-alt-dots"></i>
                                </div>
                                <div class="content">
                                    <h5>Email</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Địa chỉ</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_address', 'Khu Công nghệ cao, Quận 9, TP. HCM') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Điện thoại</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_hotline', '1900 1000') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay=".5s">
                    <div class="contact-box-items">
                        <div class="contact-title">
                            <h3>Trung tâm hỗ trợ đối tác</h3>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <div class="icon">
                                    <i class="fas fa-comment-alt-dots"></i>
                                </div>
                                <div class="content">
                                    <h5>Email</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_email_hello', 'partner@greencredit.vn') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Địa chỉ</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_address', 'Khu Công nghệ cao, Quận 9, TP. HCM') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Điện thoại</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_hotline', '1900 1000') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay=".7s">
                    <div class="contact-box-items">
                        <div class="contact-title">
                            <h3>Trung tâm hỗ trợ người dùng</h3>
                        </div>
                        <ul class="contact-info">
                            <li>
                                <div class="icon">
                                    <i class="fas fa-comment-alt-dots"></i>
                                </div>
                                <div class="content">
                                    <h5>Email</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_email', 'support@greencredit.vn') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Địa chỉ</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_address', 'Khu Công nghệ cao, Quận 9, TP. HCM') }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="content">
                                    <h5>Điện thoại</h5>
                                    <p>{{ \App\Models\SystemSetting::get('site_hotline', '1900 1000') }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section Start -->
    <section class="contact-section-6">
        <div class="container">
            <div class="contact-wrapper-6">
                <div class="plane-shape float-bob-y">
                    <img src="{{ asset('frontend/assets/img/plane-shape.png') }}" alt="img">
                </div>
                <div class="section-title text-center">
                    <span class="wow fadeInUp">Liên hệ</span>
                    <h2 class="char-animation">Cùng nâng tầm<br>lối sống xanh của bạn</h2>
                </div>
                <form action="#" id="contact-form" class="contact-form-box">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".3s">
                            <div class="form-clt">
                                <input type="text" name="name" id="name" placeholder="Họ và tên">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay=".5s">
                            <div class="form-clt">
                                <input type="text" name="email" id="email2" placeholder="Địa chỉ email">
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
                                <textarea name="message" id="message" placeholder="Nội dung tin nhắn..."></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 wow fadeInUp" data-wow-delay=".9s">
                            <div class="contact-button text-center">
                                <button type="submit" class="theme-btn">
                                    Gửi tin nhắn
                                    <i class="far fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <div class="map-section-contact">
        <div class="google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6678.7619084840835!2d144.9618311901502!3d-37.81450084255415!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642b4758afc1d%3A0x3119cc820fdfc62e!2sEnvato!5e0!3m2!1sen!2sbd!4v1641984054261!5m2!1sen!2sbd"
                style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Cta Call Section Start -->
    <section class="cta-call-section-5 section-padding bg-cover"
        style="background-image: url('{{ asset('frontend/assets/img/cta-call.jpg') }}');">
        <div class="container">
            <div class="cta-call-wrapper style-padding">
                <div class="section-title text-center mb-0">
                    <span class="text-white wow fadeInUp">Bắt đầu ngay hôm nay</span>
                    <h2 class="text-white wow fadeInUp" data-wow-delay=".2s">
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
                        <p>{{ \App\Models\SystemSetting::get('site_address', 'Khu Công nghệ cao, Quận 9, TP. HCM') }}</p>
                    </div>
                </div>
                <div class="icon-items wow fadeInUp" data-wow-delay=".5s">
                    <div class="icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="content">
                        <h3>Hotline hỗ trợ</h3>
                        <p><a href="tel:{{ str_replace(' ', '', \App\Models\SystemSetting::get('site_hotline', '1900 1000')) }}">{{ \App\Models\SystemSetting::get('site_hotline', '1900 1000') }}</a></p>
                    </div>
                </div>
                <div class="icon-items wow fadeInUp" data-wow-delay=".7s">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="content">
                        <h3>Email liên hệ</h3>
                        <p><a href="mailto:{{ \App\Models\SystemSetting::get('site_email', 'support@greencredit.vn') }}" class="link">{{ \App\Models\SystemSetting::get('site_email', 'support@greencredit.vn') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
