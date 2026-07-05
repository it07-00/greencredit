<div>
    <section class="relative overflow-hidden rounded-b-[2rem] bg-gradient-to-br from-emerald-50 via-white to-lime-50">
        <div class="absolute inset-x-0 bottom-0 h-44 bg-[linear-gradient(to_top,rgba(21,128,61,.12),transparent)]"></div>
        <div class="relative mx-auto grid max-w-7xl gap-8 px-4 py-12 lg:grid-cols-[.9fr_1.1fr]">
            <div class="self-center">
                <h1 class="text-5xl font-black leading-tight text-emerald-950 md:text-6xl">Green Score & Net Zero Planner</h1>
                <p class="mt-5 max-w-xl text-lg leading-8 text-slate-700">Theo doi hanh vi xanh, nang diem Green Score va tien gan hon den muc tieu Net Zero cua ban.</p>
                <div class="mt-8 inline-flex items-center gap-4 rounded-3xl bg-white/80 p-4 shadow-sm ring-1 ring-emerald-100">
                    <span class="grid h-14 w-14 place-items-center rounded-2xl bg-emerald-100 text-3xl">🌿</span>
                    <div><p class="text-sm text-slate-500">Hanh trinh cua ban</p><p class="font-black text-emerald-950">Vi mot tuong lai xanh</p></div>
                </div>
            </div>
            <div class="grid gap-4 lg:grid-cols-[1fr_1fr_.7fr]">
                <div class="rounded-[2rem] bg-white p-6 text-center shadow-xl shadow-emerald-950/10 ring-1 ring-emerald-100">
                    <p class="font-bold text-slate-600">Green Score hien tai</p>
                    <div class="mx-auto mt-5 grid h-44 w-44 place-items-center rounded-full bg-[conic-gradient(#16a34a_0_82%,#e5f3e8_82%_100%)] p-4">
                        <div class="grid h-full w-full place-items-center rounded-full bg-white">
                            <div><p class="text-5xl font-black text-emerald-950">{{ $history->score }}</p><p class="text-slate-500">/1000</p></div>
                        </div>
                    </div>
                    <p class="mt-4 text-xl font-black text-emerald-900">🌱 Rat tot</p>
                    <p class="mt-2 text-sm font-bold text-emerald-700">↑ 120 diem so voi thang truoc</p>
                </div>
                <div class="rounded-[2rem] bg-white p-6 shadow-xl shadow-emerald-950/10 ring-1 ring-emerald-100">
                    <div class="flex items-center justify-between"><div><p class="text-sm text-slate-500">Xin chao</p><h2 class="text-2xl font-black">Ban</h2></div><div class="grid h-14 w-14 place-items-center rounded-full bg-emerald-100">👤</div></div>
                    <div class="mt-6 space-y-5">
                        <div class="flex gap-4"><span class="text-4xl">🌳</span><div><p class="text-sm text-slate-500">Cap do hien tai</p><p class="text-xl font-black text-emerald-950">{{ $history->level_code ?: 'seed' }}</p></div></div>
                        <div class="flex gap-4"><span class="text-4xl">🔥</span><div><p class="text-sm text-slate-500">Chuoi ngay xanh</p><p class="text-xl font-black text-emerald-950">28 ngay</p></div></div>
                    </div>
                </div>
                <div class="grid gap-4">
                    @foreach ([['🔁','Hanh dong xanh','128 lan'],['🌫','CO2 giam','128 kg'],['🧴','Nhua giam','3,6 kg'],['🍃','Diem tuan nay','+86 diem']] as $kpi)
                        <div class="rounded-3xl bg-white p-4 shadow-sm ring-1 ring-emerald-100"><div class="flex gap-3"><span class="grid h-11 w-11 place-items-center rounded-2xl bg-emerald-50 text-2xl">{{ $kpi[0] }}</span><div><p class="text-xs text-slate-500">{{ $kpi[1] }}</p><p class="text-xl font-black text-emerald-900">{{ $kpi[2] }}</p></div></div></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-10">
        <div class="grid gap-4 md:grid-cols-5">
            @foreach ([['👥','25.000+','nguoi dung'],['🏪','350+','cua hang doi tac'],['🍃','1,2 trieu','diem xanh da tao'],['🧴','18 tan','nhua giam thieu'],['☁','2.8 tan','CO2 giam thieu']] as $stat)
                <div class="rounded-3xl bg-white p-5 shadow-sm ring-1 ring-emerald-100"><div class="text-3xl">{{ $stat[0] }}</div><p class="mt-3 text-2xl font-black text-emerald-800">{{ $stat[1] }}</p><p class="text-sm text-slate-500">{{ $stat[2] }}</p></div>
            @endforeach
        </div>

        <h2 class="mt-10 text-center text-3xl font-black text-emerald-950">Phan tich hanh vi xanh cua ban 🌱</h2>
        <div class="mt-6 grid gap-5 lg:grid-cols-3">
            @foreach ([['Xu huong diem xanh', $history->score.' diem', '↑ 120 diem so voi 6 thang truoc', 'from-emerald-200 to-emerald-600'], ['Luong CO2 giam', '128 kg', '↑ 18 kg so voi thang truoc', 'from-lime-200 to-green-600'], ['Luong nhua giam', '3,6 kg', '↑ 0,8 kg so voi thang truoc', 'from-teal-200 to-emerald-500']] as $chart)
                <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <div class="flex items-start justify-between"><div><h3 class="font-black text-emerald-950">{{ $chart[0] }}</h3><p class="mt-3 text-3xl font-black text-emerald-900">{{ $chart[1] }}</p><p class="mt-1 text-sm font-bold text-emerald-700">{{ $chart[2] }}</p></div><span class="rounded-xl bg-slate-50 px-3 py-2 text-xs">6 thang</span></div>
                    <div class="mt-8 flex h-32 items-end gap-3 border-b border-l border-slate-100 px-3">
                        @foreach ([35,48,42,70,62,82] as $bar)
                            <div class="w-full rounded-t-xl bg-gradient-to-t {{ $chart[3] }}" style="height: {{ $bar }}%"></div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 grid gap-5 lg:grid-cols-[1.1fr_.9fr]">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="font-black text-emerald-950">Ty le hanh dong xanh</h3>
                <div class="mt-6 grid gap-6 md:grid-cols-[.7fr_1fr]">
                    <div class="grid place-items-center"><div class="grid h-44 w-44 place-items-center rounded-full bg-[conic-gradient(#15803d_0_78%,#dcfce7_78%_100%)] p-5"><div class="grid h-full w-full place-items-center rounded-full bg-white"><strong class="text-4xl text-emerald-900">78%</strong></div></div></div>
                    <div class="space-y-4">
                        @foreach ([['Giao thong xanh','86%'],['Tieu dung ben vung','74%'],['Tiet kiem nang luong','70%'],['Giam thieu rac thai','82%']] as $ratio)
                            <div><div class="flex justify-between text-sm font-bold"><span>{{ $ratio[0] }}</span><span>{{ $ratio[1] }}</span></div><div class="mt-2 h-2 rounded-full bg-emerald-50"><div class="h-2 rounded-full bg-emerald-600" style="width: {{ $ratio[1] }}"></div></div></div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="flex justify-between"><h3 class="font-black text-emerald-950">Top thoi quen xanh</h3><span class="text-sm font-bold text-emerald-700">Xem tat ca</span></div>
                <div class="mt-5 divide-y">
                    @foreach ([['🍶','Mang binh ca nhan','28 lan','+28 diem'],['🥤','Khong dung ong hut','25 lan','+25 diem'],['🚲','Di bo / Xe dap','18 lan','+18 diem'],['♻','Tai che rac thai','15 lan','+15 diem'],['🛍','Dung tui vai','14 lan','+14 diem']] as $habit)
                        <div class="grid grid-cols-[auto_1fr_auto_auto] items-center gap-3 py-3 text-sm"><span class="text-2xl">{{ $habit[0] }}</span><span>{{ $habit[1] }}</span><span>{{ $habit[2] }}</span><strong class="text-emerald-700">{{ $habit[3] }}</strong></div>
                    @endforeach
                </div>
            </div>
        </div>

        <h2 class="mt-10 text-center text-3xl font-black text-emerald-950">Lo trinh Net Zero ca nhan 🌿</h2>
        <div class="mt-6 grid gap-4 md:grid-cols-5">
            @foreach ([['Thang 5','Nhan thuc','Xay dung thoi quen xanh hang ngay'],['Thang 6','Tiet giam','Giam tieu thu nhua va rac thai'],['Thang 7','Toi uu','Toi uu nang luong va di chuyen'],['Thang 8','Bu dap','Tham gia trong cay, bu dap CO2'],['Thang 9','Net Zero','Duy tri loi song xanh dat Net Zero']] as $road)
                <div class="rounded-3xl bg-white p-5 ring-1 ring-emerald-100"><p class="text-sm font-bold text-emerald-700">{{ $road[0] }}</p><h3 class="mt-3 font-black text-emerald-950">{{ $road[1] }}</h3><p class="mt-2 text-sm text-slate-600">{{ $road[2] }}</p></div>
            @endforeach
        </div>

        <div class="mt-6 grid gap-5 lg:grid-cols-2">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="font-black text-emerald-950">Muc tieu thang nay</h3>
                <div class="mt-5 space-y-4">
                    @foreach ([['Mang binh ca nhan them 3 lan','2/3','66%','+15 diem'],['Khong dung ong hut them 5 lan','3/5','60%','+20 diem'],['Di bo hoac dap xe 10 km','6/10 km','60%','+20 diem'],['Tai che rac thai 2 lan','1/2','50%','+15 diem']] as $goal)
                        <div><div class="flex justify-between text-sm font-bold"><span>{{ $goal[0] }}</span><span>{{ $goal[1] }} {{ $goal[3] }}</span></div><div class="mt-2 h-2 rounded-full bg-slate-100"><div class="h-2 rounded-full bg-emerald-600" style="width: {{ $goal[2] }}"></div></div></div>
                    @endforeach
                </div>
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="font-black text-emerald-950">De xuat danh rieng cho ban <span class="rounded bg-emerald-100 px-2 py-1 text-xs text-emerald-700">AI</span></h3>
                <div class="mt-5 space-y-3">
                    @foreach (['Thu mang hop dung khi mua do an mang ve de giam rac thai nhua.', 'Ban co the di bo gan hon 2 km thay vi di chuyen bang xe may.', 'Hay tat cac thiet bi dien khi khong su dung de tiet kiem dien nang.'] as $tip)
                        <div class="flex items-center justify-between gap-3 rounded-2xl border border-slate-100 p-4"><span class="text-sm text-slate-700">{{ $tip }}</span><button class="rounded-xl border border-emerald-300 px-4 py-2 text-sm font-bold text-emerald-700">Ap dung</button></div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-6 grid gap-5 lg:grid-cols-3">
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="font-black text-emerald-950">Hang cap Green Score</h3>
                <div class="mt-5 grid grid-cols-5 gap-2 text-center text-xs">
                    @foreach ($levels as $level)
                        <div class="rounded-2xl {{ $history->level_code === $level->code ? 'bg-emerald-50 ring-2 ring-emerald-400' : 'bg-slate-50' }} p-3"><div class="text-2xl">🌱</div><strong>{{ $level->name }}</strong><p>{{ $level->min_score }}-{{ $level->max_score }}</p></div>
                    @endforeach
                </div>
                <div class="mt-5 h-3 rounded-full bg-emerald-50"><div class="h-3 rounded-full bg-emerald-600" style="width: {{ min(100, $history->score / 10) }}%"></div></div>
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="font-black text-emerald-950">Bang xep hang thang</h3>
                <div class="mt-5 space-y-3 text-sm">
                    @foreach ([['1','Minh Huy','1.050 diem'],['2','Ngoc Anh','980 diem'],['3','Hoang Nam','930 diem'],['4','Ban',''.$history->score.' diem']] as $rank)
                        <div class="flex justify-between rounded-2xl {{ $rank[1] === 'Ban' ? 'bg-emerald-50 ring-1 ring-emerald-300' : 'bg-slate-50' }} p-3"><span>{{ $rank[0] }}. {{ $rank[1] }}</span><strong>{{ $rank[2] }}</strong></div>
                    @endforeach
                </div>
            </div>
            <div class="rounded-3xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h3 class="font-black text-emerald-950">Cot moc cua ban</h3>
                <div class="mt-5 space-y-4 text-sm">
                    @foreach ([['✓','Tham gia Green Credit','06/2024'],['✓','Dat cap Leaf','07/2024'],['✓','Dat cap Tree','03/2025'],['○','Dat cap Forest','Sap toi'],['○','Tro thanh Net Zero Hero','Sap toi']] as $milestone)
                        <div class="flex justify-between"><span>{{ $milestone[0] }} {{ $milestone[1] }}</span><span class="text-slate-500">{{ $milestone[2] }}</span></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
