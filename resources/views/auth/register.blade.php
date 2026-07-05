<x-layouts.app title="Bat dau hanh trinh xanh">
    <section class="relative overflow-hidden bg-gradient-to-b from-emerald-50 via-white to-[#f6fff7]">
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-56 bg-[radial-gradient(circle_at_22%_40%,rgba(34,197,94,.22),transparent_28%),linear-gradient(to_top,rgba(21,128,61,.12),transparent)]"></div>
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 py-14 lg:grid-cols-[.92fr_1.08fr]">
            <div class="relative z-10">
                <h1 class="max-w-2xl text-5xl font-black leading-tight text-emerald-950 md:text-6xl">Bat dau hanh trinh xanh</h1>
                <p class="mt-5 max-w-lg text-lg leading-8 text-slate-700">Tao tai khoan va thiet lap ho so xanh de nhan uu dai, tich diem va gop phan xay dung tuong lai ben vung.</p>
                <div class="mt-7 grid gap-3 text-sm font-semibold text-slate-700">
                    <span class="flex items-center gap-3"><span class="grid h-6 w-6 place-items-center rounded-full bg-emerald-100 text-emerald-700">✓</span>Mien phi tham gia</span>
                    <span class="flex items-center gap-3"><span class="grid h-6 w-6 place-items-center rounded-full bg-emerald-100 text-emerald-700">✓</span>Bao mat tuyet doi</span>
                    <span class="flex items-center gap-3"><span class="grid h-6 w-6 place-items-center rounded-full bg-emerald-100 text-emerald-700">✓</span>Chi mat 2 phut</span>
                </div>
            </div>
            <div class="relative z-10 rounded-[2rem] bg-white/90 p-6 shadow-2xl shadow-emerald-950/10 ring-1 ring-emerald-100">
                <div class="grid grid-cols-4 gap-3">
                    @foreach ([['1','👤','Tao tai khoan'],['2','🌿','Chon muc tieu'],['3','💳','Lien ket uu dai'],['4','🛡','Hoan tat ho so']] as $step)
                        <div class="text-center">
                            <div class="mx-auto grid h-11 w-11 place-items-center rounded-full {{ $loop->first ? 'bg-emerald-700 text-white' : 'bg-white text-slate-500 ring-1 ring-slate-200' }} font-black">{{ $step[0] }}</div>
                            <div class="mx-auto mt-4 grid h-16 w-16 place-items-center rounded-2xl bg-emerald-50 text-3xl ring-1 ring-emerald-100">{{ $step[1] }}</div>
                            <p class="mt-3 text-sm font-bold text-emerald-950">{{ $step[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="mx-auto -mt-4 max-w-7xl px-4">
        <div class="grid gap-8 rounded-[2rem] bg-white p-6 shadow-xl shadow-emerald-950/10 ring-1 ring-emerald-100 lg:grid-cols-[1fr_1fr] lg:p-8">
            <form method="post" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <div class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-full bg-emerald-700 font-bold text-white">1</span><h2 class="text-2xl font-black text-emerald-950">Tao tai khoan Green Credit</h2></div>
                    <p class="mt-2 text-sm text-slate-500">Vui long cung cap thong tin de tao tai khoan cua ban.</p>
                </div>
                <label class="block text-sm font-bold text-slate-700">Ho va ten<input name="name" value="{{ old('name') }}" class="mt-2 w-full rounded-xl border-slate-200 bg-white px-4 py-3" placeholder="Nhap ho va ten" required></label>
                <label class="block text-sm font-bold text-slate-700">Email<input name="email" type="email" value="{{ old('email') }}" class="mt-2 w-full rounded-xl border-slate-200 bg-white px-4 py-3" placeholder="Nhap email cua ban" required></label>
                <div class="grid gap-4 md:grid-cols-2">
                    <label class="block text-sm font-bold text-slate-700">Mat khau<input name="password" type="password" class="mt-2 w-full rounded-xl border-slate-200 bg-white px-4 py-3" placeholder="It nhat 8 ky tu" required></label>
                    <label class="block text-sm font-bold text-slate-700">Xac nhan mat khau<input name="password_confirmation" type="password" class="mt-2 w-full rounded-xl border-slate-200 bg-white px-4 py-3" placeholder="Nhap lai mat khau" required></label>
                </div>
                <label class="block text-sm font-bold text-slate-700">Khu vuc sinh song
                    <select name="city" class="mt-2 w-full rounded-xl border-slate-200 bg-white px-4 py-3">
                        <option value="">Chon tinh / thanh pho</option>
                        <option>TP.HCM</option><option>Ha Noi</option><option>Da Nang</option><option>Can Tho</option>
                    </select>
                </label>
                <div>
                    <p class="text-sm font-bold text-slate-700">So thich song xanh</p>
                    <div class="mt-3 grid gap-3 sm:grid-cols-3">
                        @foreach ([['plastic','♻','Giam nhua'],['energy','💡','Tiet kiem nang luong'],['food','🥗','An uong lanh manh'],['transport','🚲','Di chuyen xanh'],['recycling','🔁','Tai che'],['tree','🌱','Trong cay']] as $interest)
                            <label class="flex cursor-pointer items-center gap-2 rounded-xl border border-slate-200 px-3 py-3 text-sm font-semibold hover:border-emerald-300"><input type="checkbox" name="green_interests[]" value="{{ $interest[0] }}" class="rounded text-emerald-700"><span>{{ $interest[1] }}</span>{{ $interest[2] }}</label>
                        @endforeach
                    </div>
                </div>
                @if ($errors->any())<div class="rounded-xl bg-red-50 p-4 text-sm text-red-700">{{ $errors->first() }}</div>@endif
                <label class="flex items-start gap-3 text-sm text-slate-600"><input type="checkbox" required class="mt-1 rounded text-emerald-700">Toi dong y voi Dieu khoan su dung va Chinh sach bao mat cua Green Credit</label>
                <button class="group flex w-full items-center justify-center gap-3 rounded-xl bg-gradient-to-r from-emerald-700 to-green-600 px-5 py-4 font-black text-white shadow-lg shadow-emerald-900/20">Tao tai khoan ngay <span class="transition group-hover:translate-x-1">→</span></button>
                <p class="text-center text-sm">Da co tai khoan? <a href="{{ route('login') }}" class="font-bold text-emerald-700">Dang nhap</a></p>
            </form>

            <div>
                <div class="flex items-center gap-3"><span class="grid h-8 w-8 place-items-center rounded-full bg-emerald-700 font-bold text-white">2</span><h2 class="text-2xl font-black text-emerald-950">Chon muc tieu song xanh cua ban</h2></div>
                <p class="mt-2 text-sm text-slate-500">Chon 1 hoac nhieu muc tieu ban muon huong toi.</p>
                <div class="mt-6 grid gap-4 sm:grid-cols-2">
                    @foreach ([['🧴','Giam nhua','Giam thieu rac thai nhua trong sinh hoat hang ngay'],['💵','Tich Green Points','Tich diem qua cac hanh dong xanh va doi qua hap dan'],['📈','Theo doi Green Score','Theo doi va cai thien diem so song xanh cua ban'],['🌿','Lo trinh Net Zero','Xay dung lo trinh ca nhan huong toi Net Zero 2050']] as $card)
                        <div class="rounded-2xl border {{ $loop->first ? 'border-emerald-600 bg-emerald-50/50' : 'border-slate-200 bg-white' }} p-6 text-center shadow-sm">
                            <div class="mx-auto grid h-20 w-20 place-items-center rounded-3xl bg-emerald-100 text-4xl">{{ $card[0] }}</div>
                            <h3 class="mt-5 text-xl font-black text-emerald-950">{{ $card[1] }}</h3>
                            <p class="mt-2 text-sm leading-6 text-slate-600">{{ $card[2] }}</p>
                            <span class="mt-4 inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-bold text-emerald-700">+100 Green Points</span>
                        </div>
                    @endforeach
                </div>
                <div class="mt-6 rounded-2xl bg-emerald-50 p-5 text-sm font-semibold text-emerald-900">Ban co the thay doi hoac cap nhat muc tieu bat cu luc nao trong phan Ho so xanh.</div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-12">
        <div class="grid gap-5 md:grid-cols-4">
            @foreach ([['💵','Tich diem doi qua'],['💳','Uu dai doc quyen'],['📊','Theo doi cai thien'],['🌍','Gop phan vi hanh tinh']] as $reason)
                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-emerald-100"><div class="text-3xl">{{ $reason[0] }}</div><h3 class="mt-3 font-black text-emerald-950">{{ $reason[1] }}</h3><p class="mt-2 text-sm text-slate-600">Moi hanh dong xanh cua ban tao nen thay doi lon cho cong dong.</p></div>
            @endforeach
        </div>
        <div class="mt-10 rounded-[2rem] bg-gradient-to-r from-emerald-100 to-lime-50 p-8 md:flex md:items-center md:justify-between">
            <div><h2 class="text-3xl font-black text-emerald-950">San sang bat dau hanh trinh xanh?</h2><p class="mt-2 text-slate-700">Tham gia Green Credit ngay hom nay de nhan uu dai va tich diem.</p></div>
            <a href="#top" class="mt-5 inline-flex rounded-xl bg-emerald-700 px-6 py-3 font-bold text-white md:mt-0">Tao tai khoan ngay →</a>
        </div>
    </section>
</x-layouts.app>
