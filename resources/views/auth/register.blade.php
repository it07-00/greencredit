@extends('layouts.app')

@section('title', 'Đăng ký')
@section('meta_description', 'Tạo tài khoản Green Credit và bắt đầu tích điểm từ những hành động tiêu dùng bền vững.')

@push('styles')
    <style>
        .contact-wrapper-6 .contact-form-box .form-clt select {
            width: 100%;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 18px 20px;
            background: #fff;
            color: #4b5563;
        }
    </style>
@endpush

@section('content')
    <section class="breadcrumb-section fix bg-cover" style="background-image: url('{{ asset('frontend/assets/img/breadcrumb.jpg') }}');">
        <div class="container">
            <div class="row">
                <div class="page-heading">
                    <ul class="breadcrumb-list wow fadeInUp" data-wow-delay=".5s">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><i class="far fa-angle-right"></i></li>
                        <li>Đăng ký</li>
                    </ul>
                    <h2 class="wow fadeInUp" data-wow-delay=".3s">Bắt đầu hành trình xanh</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-section-6 section-padding">
        <div class="container">
            <div class="contact-wrapper-6">
                <div class="plane-shape float-bob-y"><img src="{{ asset('frontend/assets/img/plane-shape.png') }}" alt=""></div>
                <div class="section-title text-center">
                    <span class="wow fadeInUp">Tham gia Green Credit</span>
                    <h2 class="char-animation">Sống xanh hôm nay<br>Nhận giá trị ngày mai</h2>
                    <p class="mt-3">Tạo tài khoản miễn phí để tích Green Points, theo dõi Green Score và đổi voucher mô phỏng.</p>
                </div>
                <form method="post" action="{{ route('register') }}" class="contact-form-box">
                    @csrf
                    <div class="row g-4">
                        <div class="col-lg-6"><div class="form-clt"><input name="name" value="{{ old('name') }}" placeholder="Họ và tên" autocomplete="name" required></div></div>
                        <div class="col-lg-6"><div class="form-clt"><input name="email" type="email" value="{{ old('email') }}" placeholder="Địa chỉ email" autocomplete="email" required></div></div>
                        <div class="col-lg-6"><div class="form-clt"><input name="password" type="password" placeholder="Mật khẩu (ít nhất 8 ký tự)" autocomplete="new-password" required></div></div>
                        <div class="col-lg-6"><div class="form-clt"><input name="password_confirmation" type="password" placeholder="Xác nhận mật khẩu" autocomplete="new-password" required></div></div>
                        <div class="col-lg-12"><div class="form-clt"><select name="city" class="w-100"><option value="">Chọn tỉnh/thành phố</option><option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option><option value="Hà Nội">Hà Nội</option><option value="Đà Nẵng">Đà Nẵng</option><option value="Cần Thơ">Cần Thơ</option></select></div></div>
                        <div class="col-lg-12">
                            <h5 class="mb-3">Mối quan tâm sống xanh</h5>
                            <div class="row g-3">
                                @foreach (['plastic' => 'Giảm nhựa', 'energy' => 'Tiết kiệm năng lượng', 'food' => 'Ăn uống bền vững', 'transport' => 'Di chuyển xanh', 'recycling' => 'Tái chế', 'tree' => 'Trồng cây'] as $value => $label)
                                    <div class="col-md-4"><label class="d-flex align-items-center gap-2"><input type="checkbox" name="green_interests[]" value="{{ $value }}" style="width:auto;"> {{ $label }}</label></div>
                                @endforeach
                            </div>
                        </div>
                        @if ($errors->any())<div class="col-lg-12"><div class="alert alert-danger mb-0">{{ $errors->first() }}</div></div>@endif
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="theme-btn">Tạo tài khoản <i class="far fa-arrow-right"></i></button>
                            <p class="mt-4 mb-0">Đã có tài khoản? <a href="{{ route('login') }}" style="color:#15803d;font-weight:700;">Đăng nhập</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
