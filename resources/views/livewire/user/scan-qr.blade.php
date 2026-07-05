<div>
    <section class="relative overflow-hidden bg-gradient-to-b from-white via-emerald-50/60 to-white">
        <div class="absolute inset-x-0 bottom-0 h-40 bg-[linear-gradient(to_top,rgba(21,128,61,.12),transparent)]"></div>
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-14 lg:grid-cols-[1fr_.95fr]">
            <div class="relative z-10">
                <div class="text-sm font-bold text-emerald-700">Trang chu <span class="mx-2 text-slate-300">›</span> Quet QR hoa don xanh</div>
                <h1 class="mt-10 text-5xl font-black leading-tight text-emerald-950 md:text-6xl">Quet QR hoa don xanh</h1>
                <p class="mt-6 max-w-2xl text-xl leading-9 text-slate-700">Xac thuc hoa don chi trong 1 giay, tich diem Green Points va cung nhau tao tac dong xanh moi ngay.</p>
                <div class="mt-8 grid gap-3 sm:grid-cols-3">
                    @foreach ([['⚡','Xac thuc nhanh chong'],['🛡','Minh bach - Tin cay chong gian lan'],['💳','Tich diem de dang vao Green Wallet']] as $pill)
                        <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-emerald-100"><div class="text-2xl">{{ $pill[0] }}</div><p class="mt-2 text-sm font-bold text-emerald-950">{{ $pill[1] }}</p></div>
                    @endforeach
                </div>
            </div>
            <div class="relative z-10 grid gap-5 md:grid-cols-[.95fr_.9fr]">
                <div class="rounded-[2rem] bg-slate-950 p-4 text-white shadow-2xl shadow-emerald-950/20">
                    <div class="flex items-center justify-between px-2 py-2 text-sm font-bold"><span>←</span><span>Quet QR hoa don</span><span>⚡</span></div>
                    <div class="relative mt-4 grid aspect-[9/14] place-items-center overflow-hidden rounded-[1.5rem] bg-gradient-to-b from-slate-800 to-slate-950">
                        <div class="absolute inset-x-8 top-24 bottom-24 rounded-2xl border-2 border-emerald-400"></div>
                        <div class="grid h-40 w-40 place-items-center rounded-xl bg-white text-center text-xs font-black text-slate-950 shadow-xl">
                            <div class="grid grid-cols-5 gap-1">
                                @for ($i = 0; $i < 25; $i++)
                                    <span class="h-4 w-4 {{ in_array($i, [0,1,3,5,6,8,11,12,13,16,18,20,21,23,24]) ? 'bg-slate-950' : 'bg-white' }}"></span>
                                @endfor
                            </div>
                        </div>
                        <div class="absolute bottom-4 text-sm text-slate-200">Dua ma QR vao khung hinh de quet</div>
                    </div>
                </div>
                <div class="rounded-[2rem] bg-white p-6 text-center shadow-xl shadow-emerald-950/10 ring-1 ring-emerald-100">
                    <div class="mx-auto grid h-24 w-24 place-items-center rounded-full bg-gradient-to-br from-lime-300 to-emerald-600 text-5xl text-white shadow-inner">✓</div>
                    <h2 class="mt-6 font-black text-emerald-950">Xac thuc thanh cong!</h2>
                    <div class="mt-4 text-5xl font-black text-emerald-800">+125</div>
                    <p class="font-bold text-emerald-900">Green Points</p>
                    <div class="mt-5 rounded-2xl bg-emerald-50 p-4 text-sm text-emerald-900">Ban vua giup giam thieu <strong>0,28 kg CO2</strong> va <strong>0,12 kg nhua</strong></div>
                    <a href="#scan-form" class="mt-5 inline-flex rounded-xl border border-emerald-600 px-4 py-2 font-bold text-emerald-800">Quet hoa don cua ban</a>
                </div>
            </div>
        </div>
    </section>

    <section id="scan-form" class="mx-auto max-w-7xl px-4 py-12">
        <h2 class="text-center text-3xl font-black text-emerald-950">4 buoc tich diem Green Points</h2>
        <div class="mt-8 grid gap-5 md:grid-cols-4">
            @foreach ([['🏪','Mua hang tai cua hang doi tac','Chon san pham/dich vu tai hang nghin doi tac Green Credit.'],['🧾','Nhan hoa don xanh','Yeu cau hoa don co ma QR Green Credit tu cua hang.'],['📱','Quet QR xac thuc','Dung ung dung hoac website de quet ma QR va xac thuc.'],['👛','Nhan Green Points vao vi','Diem thuong duoc cong ngay vao Green Wallet.']] as $step)
                <div class="relative rounded-3xl bg-white p-7 text-center shadow-sm ring-1 ring-slate-200">
                    <span class="absolute -top-3 left-5 grid h-9 w-9 place-items-center rounded-full bg-emerald-700 font-black text-white">{{ $loop->iteration }}</span>
                    <div class="mx-auto grid h-24 w-24 place-items-center rounded-3xl bg-emerald-50 text-5xl">{{ $step[0] }}</div>
                    <h3 class="mt-5 text-lg font-black text-emerald-950">{{ $step[1] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-slate-600">{{ $step[2] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8 grid gap-6 lg:grid-cols-3">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-xl font-black text-emerald-950">Nhap QR token</h2>
                <p class="mt-2 text-sm text-slate-600">Chap nhan token raw, GREEN-CREDIT:token hoac URL scan-qr/token.</p>
                <form wire:submit="scan" class="mt-5">
                    <input wire:model="token" class="w-full rounded-xl border-slate-200 px-4 py-3" placeholder="GREEN-CREDIT:..." autofocus>
                    @error('token')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
                    <button class="mt-4 w-full rounded-xl bg-emerald-700 px-5 py-3 font-black text-white">Xac thuc QR</button>
                </form>
                @if ($error)<div class="mt-5 rounded-2xl bg-red-50 p-4 text-red-800 ring-1 ring-red-100">{{ $error }}</div>@endif
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-xl font-black text-emerald-950">Diem nhan duoc</h2>
                @if ($success)
                    <div class="mt-5 text-center"><div class="text-6xl font-black text-emerald-800">{{ $success['points'] }}</div><p class="font-bold">Green Points</p></div>
                    <div class="mt-5 grid grid-cols-2 gap-3">
                        <div class="rounded-2xl bg-emerald-50 p-4 text-center"><strong>{{ $success['co2'] }} kg</strong><p class="text-xs text-slate-600">CO2 giam</p></div>
                        <div class="rounded-2xl bg-emerald-50 p-4 text-center"><strong>{{ $success['plastic'] }} g</strong><p class="text-xs text-slate-600">Nhua giam</p></div>
                    </div>
                @else
                    <div class="mt-5 rounded-2xl bg-emerald-50 p-5 text-sm text-emerald-900">Sau khi xac thuc thanh cong, diem va tac dong moi truong se hien thi tai day.</div>
                @endif
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-xl font-black text-emerald-950">Hanh dong xanh duoc ghi nhan</h2>
                <div class="mt-5 space-y-3">
                    @foreach ([['🧴','Khong dung ly nhua'],['🥤','Khong dung ong hut'],['🍶','Mang binh ca nhan']] as $action)
                        <div class="flex items-center justify-between rounded-2xl bg-slate-50 p-4"><span class="font-bold">{{ $action[0] }} {{ $action[1] }}</span><span class="text-emerald-600">✓</span></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-8 rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-center text-2xl font-black text-emerald-950">Chong gian lan - Xac thuc minh bach</h2>
            <div class="mt-6 grid gap-4 md:grid-cols-4">
                @foreach ([['▦','QR duy nhat','Moi hoa don co mot QR duy nhat, khong the sao chep.'],['🔒','Ma hoa an toan','Du lieu duoc ma hoa va lien ket voi he thong.'],['⏱','Xac thuc thoi gian thuc','Kiem tra truc tiep voi he thong.'],['🛡','Bao ve nguoi dung','Dam bao diem thuong minh bach va cong bang.']] as $item)
                    <div class="rounded-2xl bg-emerald-50 p-5"><div class="text-3xl">{{ $item[0] }}</div><h3 class="mt-3 font-black text-emerald-950">{{ $item[1] }}</h3><p class="mt-2 text-sm text-slate-600">{{ $item[2] }}</p></div>
                @endforeach
            </div>
        </div>
    </section>
</div>
