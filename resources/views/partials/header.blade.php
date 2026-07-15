<!-- Preloader Start -->
    <div id="preloader" class="preloader">
    <div class="animation-preloader">
        <div class="spinner">
        </div>
        <div class="txt-loading">
            <span data-text-preloader="G" class="letters-loading">
                G
            </span>
            <span data-text-preloader="R" class="letters-loading">
                R
            </span>
            <span data-text-preloader="E" class="letters-loading">
                E
            </span>
            <span data-text-preloader="E" class="letters-loading">
                E
            </span>
        </div>
        <p class="text-center">Đang tải</p>
    </div>
    <div class="loader">
        <div class="row">
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-left">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
            <div class="col-3 loader-section section-right">
                <div class="bg"></div>
            </div>
        </div>
    </div>
</div>
    <!-- Back To Top start -->
    <button type="button" id="back-top" class="back-to-top" aria-label="Scroll to top">
    <i class="fas fa-long-arrow-up" aria-hidden="true"></i>
</button>
    <!-- Offcanvas Area Start -->
    <div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-5 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}" style="display:inline-flex;align-items:center;gap:10px;text-decoration:none;">
                            <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="Green Credit" style="height:40px;width:40px;border-radius:10px;object-fit:cover;">
                            <strong style="font-size: 20px; color: #15803d;">Green Credit</strong>
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <h3 class="offcanvas-title">Green Credit xin chào!</h3>
                <p>Sống xanh mỗi ngày, tích điểm thông minh <br> và cùng hướng tới Net Zero.</p>
                <div class="mobile-menu fix mt-3"></div>
                <div class="social-icon d-flex align-items-center">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="offcanvas__contact">
                    <h3>Thông tin liên hệ</h3>
                    <ul class="contact-list">
                        <li>
                            <span>
                                Địa chỉ:
                            </span>
                            {{ \App\Models\SystemSetting::get('site_address', 'Khu Công nghệ cao, Quận 9, TP. HCM') }}
                        </li>
                        <li>
                            <span>
                                Hotline:
                            </span>
                            <a href="tel:{{ str_replace(' ', '', \App\Models\SystemSetting::get('site_phone', '028 1234 5678')) }}">{{ \App\Models\SystemSetting::get('site_phone', '028 1234 5678') }}</a>
                        </li>
                        <li>
                            <span>
                                Email:
                            </span>
                            <a href="mailto:{{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}">
                                {{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('contact') }}" class="theme-btn">Liên hệ hợp tác <i class="far fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>
@include('partials.navbar')
