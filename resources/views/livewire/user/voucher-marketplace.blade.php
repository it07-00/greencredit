<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <h1 class="text-3xl font-bold">Voucher Marketplace</h1>
        @if ($message)<div class="mt-4 rounded-xl bg-emerald-50 p-4 text-emerald-900">{{ $message }}</div>@endif
        <div class="mt-6 flex flex-wrap gap-3">
            <input wire:model.live="search" class="rounded-xl border-slate-200" placeholder="Tim voucher">
            <select wire:model.live="category" class="rounded-xl border-slate-200">
                <option value="">Tat ca</option><option value="cafe">Cafe</option><option value="supermarket">Sieu thi</option><option value="wallet">Vi</option><option value="finance">Tai chinh</option>
            </select>
        </div>
        <div class="mt-6 grid gap-5 md:grid-cols-3">
            @foreach ($vouchers as $voucher)
                <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                    <p class="text-sm font-semibold text-emerald-700">{{ $voucher->category }}</p>
                    <h2 class="mt-2 text-xl font-bold">{{ $voucher->title }}</h2>
                    <p class="mt-2 text-sm text-slate-600">{{ $voucher->description }}</p>
                    <dl class="mt-4 grid grid-cols-2 gap-3 text-sm">
                        <div><dt class="text-slate-500">Diem can doi</dt><dd class="font-bold">{{ $voucher->required_points }}</dd></div>
                        <div><dt class="text-slate-500">Giam</dt><dd class="font-bold">{{ $voucher->discount_value }}</dd></div>
                        <div><dt class="text-slate-500">Min score</dt><dd>{{ $voucher->min_green_score }}</dd></div>
                        <div><dt class="text-slate-500">Con lai</dt><dd>{{ $voucher->quantity ? $voucher->quantity - $voucher->used_quantity : 'Khong gioi han' }}</dd></div>
                    </dl>
                    <button wire:click="redeem({{ $voucher->id }})" class="mt-5 w-full rounded-xl bg-emerald-700 px-4 py-2 font-semibold text-white">Doi ngay</button>
                </div>
            @endforeach
        </div>
    </section>
</div>
