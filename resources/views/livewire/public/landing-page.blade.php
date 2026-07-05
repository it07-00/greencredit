<div>
    <section class="gc-hero gc-leaf-bg relative overflow-hidden">
        <div class="mx-auto grid min-h-[560px] max-w-7xl items-center gap-10 px-4 py-10 lg:grid-cols-[.86fr_1.14fr]">
            <div class="relative z-10">
                <h1 class="text-5xl font-black leading-tight text-emerald-950 md:text-6xl lg:text-7xl">Song xanh,<br>tich diem thong minh</h1>
                <p class="mt-6 max-w-xl text-lg leading-8 text-slate-700">Nen tang giup nguoi tre tich Green Points tu hanh vi tieu dung ben vung, theo doi Green Score va xay dung lo trinh Net Zero ca nhan.</p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="{{ route('user.scan-qr') }}" class="gc-pill inline-flex items-center gap-3 px-7 py-4 font-bold">Kham pha ngay <span>→</span></a>
                    <a href="{{ route('green-score.public') }}" class="gc-outline inline-flex items-center gap-3 rounded-2xl px-7 py-4 font-bold">Xem demo <span class="grid h-6 w-6 place-items-center rounded-full bg-emerald-950 text-xs text-white">▶</span></a>
                </div>
            </div>

            <div class="relative z-10 rounded-[2rem] bg-white/88 p-4 shadow-2xl shadow-emerald-950/10 ring-1 ring-emerald-100 backdrop-blur">
                <div class="grid grid-cols-[58px_1fr] overflow-hidden rounded-[1.5rem] bg-white ring-1 ring-slate-100">
                    <aside class="hidden border-r border-slate-100 bg-emerald-50/60 px-3 py-6 md:block">
                        <div class="mx-auto grid h-9 w-9 place-items-center rounded-xl bg-emerald-700 text-xs font-black text-white">GC</div>
                        <div class="mt-8 grid gap-5 text-center text-emerald-800">
                            @foreach (['⌂','↗','▣','✓','▤','◎'] as $icon)
                                <span class="grid h-8 w-8 place-items-center rounded-xl bg-white shadow-sm">{{ $icon }}</span>
                            @endforeach
                        </div>
                    </aside>
                    <div class="p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-black text-emerald-950">Xin chao, An!</h2>
                                <p class="text-sm text-slate-500">Cung nhau tao nen tuong lai xanh</p>
                            </div>
                            <div class="flex items-center gap-3"><span class="text-xl">⌁</span><span class="grid h-11 w-11 place-items-center rounded-full bg-emerald-100 font-bold text-emerald-800">A</span></div>
                        </div>
                        <div class="mt-5 grid gap-4 md:grid-cols-[1fr_1fr_.8fr]">
                            <div class="gc-card rounded-2xl p-5">
                                <p class="text-sm font-bold">Green Points</p>
                                <p class="mt-6 text-4xl font-black text-emerald-900">12.580</p>
                                <p class="mt-2 text-xs font-bold text-emerald-600">+ 1.250 diem tuan nay</p>
                            </div>
                            <div class="gc-card rounded-2xl p-5 text-center">
                                <p class="text-sm font-bold text-left">Green Score</p>
                                <div class="mx-auto mt-3 grid h-32 w-32 place-items-center rounded-full bg-[conic-gradient(#16a34a_0_82%,#dcfce7_82%_100%)] p-3">
                                    <div class="grid h-full w-full place-items-center rounded-full bg-white"><div><p class="text-3xl font-black">820</p><p class="text-xs text-slate-500">/1000</p></div></div>
                                </div>
                                <p class="mt-2 text-sm font-bold text-emerald-800">Cap do: Tree</p>
                            </div>
                            <div class="rounded-2xl bg-emerald-950 p-4 text-white">
                                <p class="text-sm font-bold">Quet QR hoa don</p>
                                <p class="mt-1 text-xs text-emerald-100">Quet de tich diem</p>
                                <div class="mx-auto mt-4 grid h-24 w-24 grid-cols-5 gap-1 rounded-xl bg-white p-2">
                                    @for ($i = 0; $i < 25; $i++)
                                        <span class="{{ in_array($i, [0,1,3,5,6,8,11,12,13,16,18,20,21,23,24]) ? 'bg-emerald-950' : 'bg-white' }}"></span>
                                    @endfor
                                </div>
                                <a href="{{ route('user.scan-qr') }}" class="mt-4 block rounded-xl bg-emerald-700 px-3 py-2 text-center text-sm font-bold">Quet ngay</a>
                            </div>
                            <div class="gc-card rounded-2xl p-5"><p class="text-sm font-bold">CO2 da giam thieu</p><p class="mt-6 text-4xl font-black text-emerald-900">128 <span class="text-lg">kg</span></p><p class="mt-2 text-xs font-bold text-emerald-600">-10 cay xanh trong 30 ngay</p></div>
                            <div class="gc-card rounded-2xl p-5 md:col-span-2"><div class="flex justify-between text-sm font-bold"><span>Xu huong tich diem</span><span class="rounded-full bg-slate-50 px-3 py-1 text-xs">30 ngay</span></div><div class="mt-6 flex h-24 items-end gap-2 border-b border-l border-slate-100 px-3">@foreach ([18,30,26,42,38,55,48,72,60,82] as $bar)<div class="w-full rounded-t-lg bg-gradient-to-t from-emerald-600 to-lime-400" style="height: {{ $bar }}%"></div>@endforeach</div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-8">
        <div class="grid gap-4 md:grid-cols-4">
            @foreach ([['users', '25.000+', 'nguoi dung'], ['store', '350+', 'cua hang doi tac'], ['leaf', '1,2 trieu', 'diem xanh'], ['bottle', '18 tan', 'nhua giam thieu']] as $stat)
                <div class="gc-card flex items-center gap-5 rounded-2xl p-6">
                    <div class="grid h-16 w-16 place-items-center rounded-full bg-emerald-100 text-2xl font-black text-emerald-700">{{ strtoupper(substr($stat[0],0,1)) }}</div>
                    <div><p class="text-3xl font-black text-emerald-800">{{ $stat[1] }}</p><p class="text-sm text-slate-600">{{ $stat[2] }}</p></div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-6">
        <h2 class="text-center text-3xl font-black text-emerald-950">Tinh nang noi bat</h2>
        <div class="mx-auto mt-2 h-4 w-16 rounded-full bg-emerald-100"></div>
        <div class="mt-8 grid gap-5 md:grid-cols-3">
            @foreach ([['QR','Quet QR hoa don xanh','Quet QR tren hoa don tai cac cua hang doi tac de tich diem Green Points de dang.'],['VI','Green Wallet','Quan ly diem xanh, lich su giao dich va cac uu dai danh rieng cho ban.'],['SC','Green Score','Theo doi diem so va thang hang dua tren hanh vi tieu dung ben vung.'],['%','Doi voucher','Doi diem xanh lay voucher hap dan tu nhieu thuong hieu va doi tac.'],['NZ','Net Zero Planner','Xay dung lo trinh ca nhan hoa de giam phat thai va dat muc tieu Net Zero.'],['BI','Phan tich du lieu','Xem bao cao, bieu do va insight ve hanh vi tieu dung xanh theo thoi gian.']] as $feature)
                <div class="gc-card flex gap-5 rounded-2xl p-6">
                    <div class="grid h-16 w-16 shrink-0 place-items-center rounded-2xl bg-emerald-100 text-xl font-black text-emerald-700">{{ $feature[0] }}</div>
                    <div><h3 class="text-lg font-black text-emerald-950">{{ $feature[1] }}</h3><p class="mt-2 text-sm leading-6 text-slate-600">{{ $feature[2] }}</p></div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-8">
        <h2 class="text-center text-3xl font-black text-emerald-950">Cach Green Credit hoat dong</h2>
        <div class="mt-8 grid gap-5 md:grid-cols-4">
            @foreach ([['1. Mua hang xanh','Chon san pham/dich vu ben vung tai cua hang doi tac.'],['2. Quet QR','Quet ma QR tren hoa don de xac nhan giao dich.'],['3. Nhan Green Points','Nhan diem xanh tuong ung va luu vao Green Wallet.'],['4. Doi uu dai & theo doi Green Score','Doi voucher, theo doi tien do va hang Green Score.']] as $step)
                <div class="gc-card rounded-3xl p-6">
                    <div class="mb-5 grid h-16 w-16 place-items-center rounded-2xl bg-emerald-100 text-2xl font-black text-emerald-700">{{ $loop->iteration }}</div>
                    <h3 class="font-black text-emerald-950">{{ $step[0] }}</h3>
                    <p class="mt-2 text-sm leading-6 text-slate-600">{{ $step[1] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-8 px-4 py-8 lg:grid-cols-[.78fr_1.22fr]">
        <div class="self-center">
            <h2 class="text-4xl font-black leading-tight text-emerald-950">He thong cham diem<br>Green Score</h2>
            <p class="mt-5 text-slate-700">Danh gia hanh vi tieu dung ben vung qua tung cap do. Cang xanh, Cang cao - Cang nhieu gia tri ban nhan duoc.</p>
        </div>
        <div class="grid gap-4 md:grid-cols-5">
            @foreach ([['Seed','0 - 199','Khoi dau hanh trinh song xanh'],['Leaf','200 - 399','Hinh thanh thoi quen tieu dung xanh'],['Tree','400 - 699','Duy tri loi song xanh moi ngay'],['Forest','700 - 899','Truyen cam hung, lan toa loi song xanh'],['Net Zero Hero','900 - 1000','Dan dau hanh dong vi hanh tinh xanh']] as $tier)
                <div class="gc-card rounded-2xl p-5 text-center">
                    <div class="mx-auto grid h-16 w-16 place-items-center rounded-full bg-emerald-100 text-xl font-black text-emerald-700">{{ substr($tier[0],0,1) }}</div>
                    <h3 class="mt-4 font-black text-emerald-950">{{ $tier[0] }}</h3>
                    <p class="mt-1 text-sm font-bold text-emerald-600">{{ $tier[1] }}</p>
                    <p class="mt-3 text-xs leading-5 text-slate-500">{{ $tier[2] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-8">
        <div class="gc-card rounded-[2rem] p-6">
            <h2 class="text-2xl font-black text-emerald-950">Bao cao tieu dung xanh</h2>
            <div class="mt-5 grid gap-4 md:grid-cols-4">
                @include('livewire.partials.stat-card', ['label' => 'Luong CO2 giam', 'value' => '128 kg', 'hint' => '+24% so voi thang truoc'])
                @include('livewire.partials.stat-card', ['label' => 'Ty le khong dung nhua', 'value' => '72%', 'hint' => '+15% so voi thang truoc'])
                @include('livewire.partials.stat-card', ['label' => 'Tong Green Points', 'value' => '12.580', 'hint' => '+1.250 diem tuan nay'])
                <div class="gc-card rounded-[1.75rem] p-6"><h3 class="font-black text-emerald-950">Top cua hang xanh</h3><div class="mt-4 space-y-3 text-sm">@foreach (['Xanh Market','The Green House','EcoShop','Leafy Cafe','Organic Food Store'] as $store)<div class="flex justify-between"><span>{{ $loop->iteration }}. {{ $store }}</span><strong>{{ 2500 - $loop->index * 310 }} diem</strong></div>@endforeach</div></div>
            </div>
            <div class="mt-5 grid gap-5 lg:grid-cols-[1.1fr_.9fr]">
                <div class="gc-card rounded-[1.75rem] p-6"><div class="flex justify-between"><h3 class="font-black text-emerald-950">Xu huong Green Points</h3><span class="rounded-full bg-slate-50 px-3 py-1 text-xs">30 ngay</span></div><div class="mt-6 flex h-48 items-end gap-3 border-b border-l border-slate-100 px-3">@foreach ([12,24,38,30,55,44,72,58,82,68,94] as $bar)<div class="w-full rounded-t-xl bg-gradient-to-t from-emerald-600 to-lime-400" style="height: {{ $bar }}%"></div>@endforeach</div></div>
                <div class="gc-card rounded-[1.75rem] p-6"><h3 class="font-black text-emerald-950">Phan bo danh muc</h3><div class="mx-auto mt-6 grid h-44 w-44 place-items-center rounded-full bg-[conic-gradient(#16a34a_0_42%,#84cc16_42%_70%,#facc15_70%_85%,#0f766e_85%_95%,#e2e8f0_95%_100%)] p-7"><div class="h-full w-full rounded-full bg-white"></div></div><div class="mt-4 grid gap-2 text-sm text-slate-600"><span>Thuc pham & do uong 42%</span><span>Mua sam 28%</span><span>Di chuyen 15%</span></div></div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-8">
        <h2 class="text-center text-3xl font-black text-emerald-950">Danh cho cua hang va doi tac</h2>
        <div class="mt-8 grid gap-5 md:grid-cols-3">
            @foreach ([['Cua hang doi tac','Tham gia mang luoi Green Credit de ket noi voi cong dong khach hang xanh va gia tang doanh so ben vung.'],['Doi tac voucher','Cung cap uu dai hap dan den dung khach hang muc tieu yeu thich loi song xanh.'],['Doi tac tai chinh','Dong hanh cung Green Credit thuc day tai chinh xanh va cac giai phap ben vung.']] as $partner)
                <div class="gc-card rounded-3xl p-7"><div class="mb-5 grid h-16 w-16 place-items-center rounded-2xl bg-emerald-100 text-xl font-black text-emerald-700">{{ $loop->iteration }}</div><h3 class="text-xl font-black text-emerald-950">{{ $partner[0] }}</h3><p class="mt-3 text-sm leading-6 text-slate-600">{{ $partner[1] }}</p><a href="{{ route('contact') }}" class="mt-5 inline-flex font-bold text-emerald-700">Tim hieu them →</a></div>
            @endforeach
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 pb-10 pt-4">
        <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-r from-emerald-800 to-green-600 p-8 text-white md:flex md:items-center md:justify-between">
            <div><h2 class="text-3xl font-black">Bat dau hanh trinh song xanh cung Green Credit</h2><p class="mt-2 text-emerald-50">Moi hanh dong nho hom nay - Tao nen tuong lai ben vung ngay mai.</p></div>
            <a href="{{ route('register') }}" class="mt-6 inline-flex rounded-2xl bg-white px-7 py-4 font-black text-emerald-900 md:mt-0">Dang ky mien phi →</a>
        </div>
    </section>
</div>
