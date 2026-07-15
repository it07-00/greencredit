@if(request()->routeIs('home'))
<header id="header-sticky" class="header-section header-1">
    <div class="container">
@else
<header class="header-section-2">
    <div class="header-top-section">
        <div class="container">
            <div class="header-top-wrapper style-2">
                <ul class="top-list">
                    <li>
                        Đồng hành Net Zero: Tiêu dùng xanh nhận <b>Green Credit</b>
                    </li>
                    <li>
                        <i class="fas fa-phone-alt"></i> Hỗ trợ: 
                        <a href="tel:{{ str_replace(' ', '', \App\Models\SystemSetting::get('site_phone', '028 1234 5678')) }}">{{ \App\Models\SystemSetting::get('site_phone', '028 1234 5678') }}</a>
                    </li>
                    <li>
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}">
                            {{ \App\Models\SystemSetting::get('site_email_hello', 'hello@greencredit.vn') }}
                        </a>
                    </li>
                </ul>
                <div class="social-icon">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div id="header-sticky" class="header-1">
        <div class="container">
@endif
            <div class="mega-menu-wrapper">
                <div class="header-main">
                    <div class="header-left">
                        <a href="{{ route('home') }}" class="header-logo1" style="display:inline-flex;align-items:center;gap:10px;text-decoration:none;">
                            <img src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="Green Credit" style="height:44px;width:44px;border-radius:12px;object-fit:cover;">
                            <strong style="font-size: 20px; color: #15803d; white-space: nowrap; letter-spacing: -0.3px;">Green Credit</strong>
                        </a>
                    </div>
                    <div class="header-right d-flex justify-content-end align-items-center">
                        <div class="mean__menu-wrapper">
                            <div class="main-menu">
                                <nav id="mobile-menu" aria-label="Điều hướng chính">
                                    <ul>
                                        <li @class(['active' => request()->routeIs('home')])><a href="{{ route('home') }}">Trang chủ</a></li>
                                        @auth
                                            @if(auth()->user()->role === 'user')
                                                <li @class(['active' => request()->routeIs('dashboard')])><a href="{{ route('dashboard') }}">Trang cá nhân</a></li>
                                                <li @class(['active' => request()->routeIs('user.scan-qr')])><a href="{{ route('user.scan-qr') }}">Tích điểm</a></li>
                                                <li @class(['active' => request()->routeIs('user.vouchers')])><a href="{{ route('user.vouchers') }}">Cửa hàng đổi điểm</a></li>
                                                <li @class(['active' => request()->routeIs('user.net-zero')])><a href="{{ route('user.net-zero') }}">Kế hoạch Net Zero</a></li>
                                            @elseif(in_array(auth()->user()->role, ['store_owner', 'store_staff']))
                                                <li @class(['active' => request()->routeIs('store.dashboard')])><a href="{{ route('store.dashboard') }}">Dashboard</a></li>
                                                <li @class(['active' => request()->routeIs('store.invoices.create')])><a href="{{ route('store.invoices.create') }}">POS Thu Ngân</a></li>
                                                <li @class(['active' => request()->routeIs('store.invoices') && !request()->routeIs('store.invoices.create')])><a href="{{ route('store.invoices') }}">Hóa đơn xanh</a></li>
                                                <li @class(['active' => request()->routeIs('store.vouchers')])><a href="{{ route('store.vouchers') }}">Đổi Voucher</a></li>
                                                <li @class(['active' => request()->routeIs('store.branches')])><a href="{{ route('store.branches') }}">Chi nhánh</a></li>
                                                @if(auth()->user()->role === 'store_owner')
                                                    <li @class(['active' => request()->routeIs('store.staff')])><a href="{{ route('store.staff') }}">Nhân viên</a></li>
                                                @endif
                                                <li @class(['active' => request()->routeIs('store.reports')])><a href="{{ route('store.reports') }}">Báo cáo</a></li>
                                            @elseif(auth()->user()->role === 'partner')
                                                <li @class(['active' => request()->routeIs('partner.dashboard')])><a href="{{ route('partner.dashboard') }}">Dashboard</a></li>
                                                <li @class(['active' => request()->routeIs('partner.vouchers')])><a href="{{ route('partner.vouchers') }}">Quản lý Voucher</a></li>
                                                <li @class(['active' => request()->routeIs('partner.campaigns')])><a href="{{ route('partner.campaigns') }}">Chiến dịch xanh</a></li>
                                                <li @class(['active' => request()->routeIs('partner.financial-offers')])><a href="{{ route('partner.financial-offers') }}">Tài chính xanh</a></li>
                                                <li @class(['active' => request()->routeIs('partner.reports')])><a href="{{ route('partner.reports') }}">Báo cáo</a></li>
                                            @endif
                                        @endauth
                                        @if(!auth()->check())
                                            <li @class(['active' => request()->routeIs('about')])><a href="{{ route('about') }}">Giới thiệu</a></li>
                                            <li @class(['active' => request()->routeIs('services')])><a href="{{ route('services') }}">Tính năng</a></li>
                                            <li @class(['active' => request()->routeIs('news.index', 'news.show')])><a href="{{ route('news.index') }}">Tin tức</a></li>
                                            <li @class(['active' => request()->routeIs('contact')])><a href="{{ route('contact') }}">Liên hệ</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        @auth
                            @php $role = auth()->user()->role; @endphp

                            {{-- Cổng 1: User - thành viên tích điểm xanh --}}
                            @if($role === 'user')
                                <div class="user-nav-dropdown ms-3" style="position:relative;">
                                    <button class="user-nav-trigger d-flex align-items-center gap-2"
                                        onclick="this.closest('.user-nav-dropdown').classList.toggle('open')"
                                        style="background:none;border:1.5px solid #e5e7eb;border-radius:50px;padding:6px 14px 6px 8px;cursor:pointer;white-space:nowrap;transition:all .2s;">
                                        @if(auth()->user()->avatar)
                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="Avatar"
                                                style="width:32px;height:32px;border-radius:50%;object-fit:cover;">
                                        @else
                                            <span style="width:32px;height:32px;border-radius:50%;background:linear-gradient(135deg,#15803d,#4ade80);display:inline-flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:14px;flex-shrink:0;">
                                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                            </span>
                                        @endif
                                        <span style="font-size:14px;font-weight:600;color:#1e293b;max-width:110px;overflow:hidden;text-overflow:ellipsis;">
                                            {{ auth()->user()->name }}
                                        </span>
                                        <i class="fas fa-chevron-down" style="font-size:11px;color:#64748b;"></i>
                                    </button>
                                    <div class="user-nav-menu" style="position:absolute;right:0;top:calc(100% + 10px);min-width:220px;background:#fff;border-radius:14px;box-shadow:0 8px 32px rgba(0,0,0,.12);border:1px solid #f0f0f0;z-index:9999;overflow:hidden;opacity:0;pointer-events:none;transform:translateY(-8px);transition:all .2s;">
                                        <div style="padding:12px 16px;border-bottom:1px solid #f3f4f6;background:linear-gradient(135deg,#f0fdf4,#dcfce7);">
                                            <p style="margin:0;font-size:11px;color:#6b7280;text-transform:uppercase;letter-spacing:.5px;">Thành viên xanh</p>
                                            <p style="margin:4px 0 0;font-size:14px;font-weight:700;color:#15803d;">{{ auth()->user()->name }}</p>
                                        </div>
                                        <a href="{{ route('dashboard') }}" style="display:flex;align-items:center;gap:10px;padding:11px 16px;color:#1e293b;text-decoration:none;font-size:14px;font-weight:500;">
                                            <i class="far fa-th-large" style="color:#15803d;width:16px;"></i> Dashboard của tôi
                                        </a>
                                        <a href="{{ route('user.wallet') }}" style="display:flex;align-items:center;gap:10px;padding:11px 16px;color:#1e293b;text-decoration:none;font-size:14px;font-weight:500;border-top:1px solid #f3f4f6;">
                                            <i class="far fa-wallet" style="color:#15803d;width:16px;"></i> Green Wallet
                                        </a>
                                        <a href="{{ route('user.vouchers') }}" style="display:flex;align-items:center;gap:10px;padding:11px 16px;color:#1e293b;text-decoration:none;font-size:14px;font-weight:500;border-top:1px solid #f3f4f6;">
                                            <i class="far fa-gift" style="color:#15803d;width:16px;"></i> Cửa hàng đổi điểm
                                        </a>
                                        <form method="post" action="{{ route('logout') }}" style="border-top:1px solid #f3f4f6;">
                                            @csrf
                                            <button type="submit" style="display:flex;align-items:center;gap:10px;padding:11px 16px;color:#dc2626;background:none;border:none;width:100%;text-align:left;font-size:14px;font-weight:500;cursor:pointer;">
                                                <i class="far fa-sign-out-alt" style="width:16px;"></i> Đăng xuất
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <style>
                                    .user-nav-dropdown.open .user-nav-menu{opacity:1!important;pointer-events:auto!important;transform:translateY(0)!important;}
                                    .user-nav-trigger:hover{border-color:#15803d!important;background:#f0fdf4!important;}
                                    .user-nav-menu a:hover,.user-nav-menu button:hover{background:#f8fafb!important;}
                                </style>
                                <script>
                                    document.addEventListener('click',function(e){
                                        document.querySelectorAll('.user-nav-dropdown.open').forEach(function(el){
                                            if(!el.contains(e.target))el.classList.remove('open');
                                        });
                                    });
                                </script>

                            {{-- Cổng 2: Business Portal --}}
                            @elseif(in_array($role, ['store_owner', 'store_staff', 'partner']))
                                <div class="d-flex align-items-center gap-2 ms-3">
                                    <form method="post" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="theme-btn style-2" title="Đăng xuất"
                                            style="padding:8px 18px;font-size:13px;white-space:nowrap;">
                                            <i class="far fa-sign-out-alt me-1"></i> Đăng xuất
                                        </button>
                                    </form>
                                </div>

                            {{-- Cổng 3: Admin Portal --}}
                            @elseif(in_array($role, ['admin', 'super_admin']))
                                <a href="{{ url('/admin') }}" class="theme-btn ms-3" style="white-space:nowrap;font-size:13px;padding:8px 18px;">
                                    <i class="far fa-shield-alt me-1"></i> Quản trị hệ thống
                                </a>

                            @endif
                        @else
                            <a href="{{ route('login') }}" class="link-btn ms-3 me-3" style="margin-top:0px;">Đăng nhập</a>
                            <a href="{{ route('register') }}" class="theme-btn">Bắt đầu ngay <i class="far fa-arrow-right"></i></a>
                        @endauth
                        <div class="header__hamburger d-xl-none my-auto">
                            <button class="sidebar__toggle" type="button" aria-label="Mở menu"><i class="fal fa-bars"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@if(!request()->routeIs('home'))
    </div>
@endif
</header>
