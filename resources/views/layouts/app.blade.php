<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Green Credit - Sống xanh, tích điểm thông minh.')">
    <title>@yield('title', 'Green Credit')</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.svg') }}">
    @include('partials.styles')
    @stack('styles')
</head>
<body>
    @include('partials.header')
    <main>@yield('content')</main>
    @include('partials.footer')
    @include('partials.scripts')
    @stack('scripts')
</body>
</html>
