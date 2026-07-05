@extends('layouts.app')

@section('title', 'Đăng nhập')
@section('meta_description', 'Đăng nhập Green Credit để quản lý Green Points, Green Score và các hành động sống xanh.')

@section('content')
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="breadcrumb-wrapper">
                <div class="breadcrumb-content">
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Đăng nhập Green Credit</h2>
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Đăng nhập</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section-6 section-padding">
        <div class="container">
            <div class="contact-wrapper-6">
                <div class="plane-shape float-bob-y"><img src="{{ asset('frontend/assets/img/plane-shape.png') }}" alt=""></div>
                <div class="section-title text-center">
                    <span class="wow fadeInUp">Chào mừng trở lại</span>
                    <h2 class="char-animation">Tiếp tục hành trình<br>sống xanh của bạn</h2>
                    <p class="mt-3">Dùng tài khoản demo trong README hoặc tài khoản bạn đã đăng ký.</p>
                </div>
                <form method="post" action="{{ route('login') }}" class="contact-form-box" style="max-width: 760px; margin: 0 auto;">
                    @csrf
                    <div class="row g-4 justify-content-center">
                        <div class="col-lg-12"><div class="form-clt"><input name="email" type="email" value="{{ old('email') }}" placeholder="Địa chỉ email" autocomplete="email" required></div></div>
                        <div class="col-lg-12"><div class="form-clt"><input name="password" type="password" placeholder="Mật khẩu" autocomplete="current-password" required></div></div>
                        @if ($errors->any())<div class="col-lg-12"><div class="alert alert-danger mb-0">{{ $errors->first() }}</div></div>@endif
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="theme-btn">Đăng nhập <i class="far fa-arrow-right"></i></button>
                            <p class="mt-4 mb-0">Chưa có tài khoản? <a href="{{ route('register') }}" style="color:#15803d;font-weight:700;">Đăng ký miễn phí</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
