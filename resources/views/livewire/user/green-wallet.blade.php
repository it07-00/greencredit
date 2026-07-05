<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <h1 class="text-3xl font-bold">Green Wallet</h1>
        <div class="mt-6 grid gap-4 md:grid-cols-4">
            @include('livewire.partials.stat-card', ['label' => 'So du', 'value' => $wallet->current_balance])
            @include('livewire.partials.stat-card', ['label' => 'Tong da kiem', 'value' => $wallet->total_earned])
            @include('livewire.partials.stat-card', ['label' => 'Tong da doi', 'value' => $wallet->total_redeemed])
            @include('livewire.partials.stat-card', ['label' => 'Quy doi mo phong', 'value' => number_format($wallet->current_balance * 10).' VND', 'hint' => '100 diem = 1.000 VND'])
        </div>
        <div class="mt-6 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <div class="flex flex-wrap justify-between gap-3">
                <select wire:model.live="type" class="rounded-xl border-slate-200">
                    <option value="">Tat ca</option><option value="earn">earn</option><option value="redeem">redeem</option><option value="refund">refund</option><option value="penalty">penalty</option>
                </select>
                <a href="{{ route('user.vouchers') }}" class="rounded-xl bg-emerald-700 px-4 py-2 font-semibold text-white">Den voucher marketplace</a>
            </div>
            <div class="mt-4 divide-y">
                @foreach ($ledger as $point)
                    <div class="flex justify-between py-3 text-sm"><span>{{ $point->description }}</span><strong>{{ $point->points }}</strong></div>
                @endforeach
            </div>
            <div class="mt-4">{{ $ledger->links() }}</div>
        </div>
    </section>
</div>
