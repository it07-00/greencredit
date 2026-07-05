<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Green Credit Platform' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --gc-green:#15803d; --gc-dark:#064e3b; --gc-soft:#f1faed; --gc-mint:#dcfce7; }
        .gc-page-bg {
            background:
                radial-gradient(circle at 6% 16%, rgba(34,197,94,.14), transparent 22rem),
                radial-gradient(circle at 94% 20%, rgba(132,204,22,.18), transparent 18rem),
                linear-gradient(180deg, #ffffff 0%, #f7fff7 48%, #ffffff 100%);
        }
        .gc-hero {
            background:
                radial-gradient(circle at 18% 80%, rgba(21,128,61,.18), transparent 19rem),
                radial-gradient(circle at 88% 24%, rgba(132,204,22,.18), transparent 16rem),
                linear-gradient(135deg, #f3fbef 0%, #ffffff 48%, #edf9e8 100%);
        }
        .gc-card { background:#fff; border:1px solid rgba(21,128,61,.12); box-shadow:0 16px 45px rgba(6,78,59,.08); }
        .gc-pill { border-radius:999px; background:linear-gradient(135deg,#15803d,#047857); color:#fff; box-shadow:0 14px 28px rgba(21,128,61,.25); }
        .gc-outline { border:1px solid rgba(6,78,59,.28); color:#064e3b; background:rgba(255,255,255,.74); }
        .gc-leaf-bg::before, .gc-leaf-bg::after { content:''; position:absolute; width:14rem; height:14rem; border-radius:38% 62% 52% 48%; background:rgba(34,197,94,.13); }
        .gc-leaf-bg::before { left:-5rem; bottom:-4rem; transform:rotate(22deg); }
        .gc-leaf-bg::after { right:-4rem; top:7rem; transform:rotate(-24deg); }
    </style>
    @livewireStyles
</head>
<body class="gc-page-bg text-slate-950">
    <nav class="sticky top-0 z-40 border-b border-emerald-100/80 bg-white/95 shadow-sm shadow-emerald-900/5 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-black text-emerald-800">
                <span class="grid h-10 w-10 place-items-center rounded-full bg-emerald-100 text-sm text-emerald-700">GC</span>
                <span>Green Credit</span>
            </a>
            <div class="hidden items-center gap-8 text-sm font-bold md:flex">
                <a href="{{ route('home') }}" class="border-b-2 border-emerald-600 pb-2 text-emerald-700">Trang chu</a>
                <a href="{{ route('user.scan-qr') }}" class="hover:text-emerald-700">Tinh nang</a>
                <a href="{{ route('stores') }}" class="hover:text-emerald-700">Cua hang doi tac</a>
                <a href="{{ route('green-score.public') }}" class="hover:text-emerald-700">Green Score</a>
                <a href="{{ route('about') }}" class="hover:text-emerald-700">Ve chung toi</a>
                <a href="{{ route('contact') }}" class="hover:text-emerald-700">Lien he</a>
            </div>
            <div class="flex items-center gap-2">
                @auth
                    <a class="gc-pill px-5 py-3 text-sm font-bold" href="{{ match(auth()->user()->role) {
                        'admin', 'super_admin' => url('/admin'),
                        'store_owner', 'store_staff' => route('store.dashboard'),
                        'partner' => route('partner.dashboard'),
                        default => route('dashboard'),
                    } }}">Dashboard</a>
                    <form method="post" action="{{ route('logout') }}">@csrf<button class="rounded-xl border border-emerald-200 px-4 py-3 text-sm font-bold text-emerald-800">Thoat</button></form>
                @else
                    <a class="hidden rounded-xl border border-emerald-200 px-4 py-3 text-sm font-bold text-emerald-800 sm:inline-flex" href="{{ route('login') }}">Dang nhap</a>
                    <a class="gc-pill px-5 py-3 text-sm font-bold" href="{{ route('register') }}">Bat dau ngay</a>
                @endauth
            </div>
        </div>
    </nav>

    @if (session('success'))
        <div class="mx-auto mt-4 max-w-7xl rounded-xl bg-emerald-100 px-4 py-3 text-emerald-900">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="mx-auto mt-4 max-w-7xl rounded-xl bg-red-100 px-4 py-3 text-red-900">{{ session('error') }}</div>
    @endif

    <main>{{ $slot }}</main>

    <footer class="mt-0 bg-gradient-to-br from-emerald-950 via-emerald-900 to-green-950 text-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 md:grid-cols-4">
            <div>
                <div class="flex items-center gap-2 text-2xl font-black"><span class="grid h-9 w-9 place-items-center rounded-full bg-white/10 text-sm">GC</span> Green Credit</div>
                <p class="mt-4 text-sm leading-6 text-emerald-100">Nen tang tich diem xanh cho the he tre, vi mot tuong lai Net Zero ben vung.</p>
                <div class="mt-5 flex gap-3 text-sm">
                    <span class="grid h-8 w-8 place-items-center rounded-full border border-white/20">f</span>
                    <span class="grid h-8 w-8 place-items-center rounded-full border border-white/20">ig</span>
                    <span class="grid h-8 w-8 place-items-center rounded-full border border-white/20">yt</span>
                </div>
            </div>
            <div><h3 class="font-bold">Kham pha</h3><div class="mt-4 grid gap-2 text-sm text-emerald-100"><a href="{{ route('home') }}">Trang chu</a><a href="{{ route('user.scan-qr') }}">Tinh nang</a><a href="{{ route('green-score.public') }}">Green Score</a><a href="{{ route('stores') }}">Cua hang doi tac</a></div></div>
            <div><h3 class="font-bold">Ho tro</h3><div class="mt-4 grid gap-2 text-sm text-emerald-100"><span>Cau hoi thuong gap</span><span>Huong dan su dung</span><span>Chinh sach bao mat</span><span>Dieu khoan su dung</span></div></div>
            <div><h3 class="font-bold">Lien he</h3><div class="mt-4 grid gap-2 text-sm text-emerald-100"><span>123 Duong Xanh, TP.HCM</span><span>hello@greencredit.vn</span><span>028 1234 5678</span></div></div>
        </div>
        <div class="border-t border-white/10 py-5 text-center text-sm text-emerald-100">© 2024 Green Credit. All rights reserved.</div>
    </footer>
    @livewireScripts
</body>
</html>
