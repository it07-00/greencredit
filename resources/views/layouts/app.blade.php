<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Green Credit - Sống xanh, tích điểm thông minh.')">
    <title>@yield('title', 'Green Credit')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/logo/logo.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('frontend/assets/img/logo/logo.png') }}">
    @include('partials.styles')
    @stack('styles')
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    @include('partials.header')
    <main>@yield('content'){{ $slot ?? '' }}</main>
    @include('partials.footer')
    @include('partials.scripts')
    @stack('scripts')
    @livewireScripts
</body>

</html>