<!DOCTYPE html>
<html lang="vi" data-layout="two-column" data-content-width="fluid" data-bs-theme="light" data-sidebar-colors="light" data-sidebar="large" data-nav-type="default" dir="ltr" data-colors="default">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hệ thống POS Tích Điểm Xanh | Green Credit</title>
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.svg') }}">
    
    <!-- POS Theme Stylesheets -->
    <link rel="stylesheet" href="{{ asset('theme-pos/css/admin-Bly6avC4.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-pos/css/air-datepicker-ByzRugGb.css') }}">
    <link rel="stylesheet" href="{{ asset('theme-pos/css/virtual-select-hfXZVdeB.css') }}">
    
    <!-- FontAwesome and Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Plus Jakarta Sans Font for premium look -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
        h1, h2, h3, h4, h5, h6, .fw-medium, .fw-semibold, .fw-bold {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
        .pos-wrapper {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
        }
    </style>
    
    @livewireStyles
</head>
<body class="sidebar-hidden bg-light">

    {{ $slot }}

    @livewireScripts
</body>
</html>
