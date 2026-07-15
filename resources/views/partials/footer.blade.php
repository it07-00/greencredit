<section class="footer-section fix footer-bg">
    <div class="container">
        <div class="footer-widget-wrapper">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-footer-widget">
                        <div class="widget-head"><a href="{{ route('home') }}"
                                style="font-size: 26px; color: #fff; font-weight: 800;">Green Credit</a></div>
                        <div class="footer-content">
                            <p>Nền tảng tích điểm, chấm điểm và phân tích hành vi tiêu dùng xanh dựa trên QR Code.</p>
                            <div class="social-icon"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                        class="fab fa-youtube"></i></a><a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-5 wow fadeInUp" data-wow-delay=".4s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Khám phá</h3>
                        </div>
                        <ul class="list-area">
                            <li><a href="{{ route('services') }}">Quét QR hóa đơn xanh</a></li>
                            <li><a href="{{ route('services') }}">Green Wallet</a></li>
                            <li><a href="{{ route('green-score.public') }}">Green Score</a></li>
                            <li><a href="{{ route('vouchers.public') }}">Voucher xanh</a></li>
                            <li><a href="{{ route('services') }}">Net Zero Planner</a></li>
                            <li><a href="{{ route('news.index') }}">Tin tức sống xanh</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 ps-lg-2 wow fadeInUp" data-wow-delay=".6s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Liên hệ</h3>
                        </div>
                        <ul class="footer-contect">
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <div class="content">
                                    <h5>Hotline</h5>
                                    <p><a
                                            href="tel:{{ str_replace(' ', '', \App\Models\SystemSetting::get('site_phone', '028 1234 5678')) }}">{{ \App\Models\SystemSetting::get('site_phone', '028 1234 5678') }}</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <div class="content">
                                    <h5>Email</h5>
                                    <p><a href="mailto:{{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}"
                                            class="text-white">{{ \App\Models\SystemSetting::get('site_email_hello',
                                            'hello@greencredit.vn') }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="content">
                                    <h5>TP. Hồ Chí Minh</h5>
                                    <p class="text-white">
                                        {{ \App\Models\SystemSetting::get('site_address', 'Khu Công nghệ cao, Quận 9, TP. HCM') }}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".8s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h3>Nhận tin sống xanh</h3>
                        </div>
                        <div class="footer-content">
                            <p>Cập nhật ưu đãi, thử thách và mẹo tiêu dùng bền vững mới nhất.</p>
                            <form action="#">
                                <div class="form-clt"><input type="email" name="email" id="email1"
                                        placeholder="Email của bạn"></div><button type="submit"
                                    class="theme-btn w-100">Đăng ký <i class="far fa-arrow-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom fix">
        <div class="container">
            <div class="footer-wrapper d-flex align-items-center justify-content-between">
                <p>© 2026 Bản quyền thuộc về Green Credit.</p>
                <ul class="footer-menu">
                    <li><a href="{{ route('contact') }}">Chính sách bảo mật</a></li>
                    <li><a href="{{ route('contact') }}">Điều khoản sử dụng</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>