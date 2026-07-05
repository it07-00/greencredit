<header id="header-sticky" class="header-section header-1">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main">
                <div class="header-left">
                    <a href="{{ route('home') }}" class="header-logo1">
                        <strong style="font-size: 24px; color: #15803d; white-space: nowrap;">Green Credit</strong>
                    </a>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu" aria-label="Điều hướng chính">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">Trang chủ</a></li>
                                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}">Giới thiệu</a></li>
                                    <li class="{{ request()->routeIs('services') ? 'active' : '' }}"><a href="{{ route('services') }}">Tính năng</a></li>
                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="link-btn">Hỗ trợ: <a href="tel:02812345678">028 1234 5678</a></div>
                    <a href="{{ route('register') }}" class="theme-btn">Bắt đầu ngay <i class="far fa-arrow-right"></i></a>
                    <div class="header__hamburger d-xl-none my-auto">
                        <button class="sidebar__toggle" type="button" aria-label="Mở menu"><i class="fal fa-bars"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
