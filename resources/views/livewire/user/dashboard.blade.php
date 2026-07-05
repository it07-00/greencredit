<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">Xin chao {{ auth()->user()->name }}</p>
            <h1 class="mt-2 text-3xl font-bold">Dashboard ca nhan</h1>
        </div>
        <div class="grid gap-4 md:grid-cols-3 lg:grid-cols-6">
            @include('livewire.partials.stat-card', ['label' => 'So du diem', 'value' => $data['wallet']->current_balance ?? 0])
            @include('livewire.partials.stat-card', ['label' => 'Green Score', 'value' => $data['score']->score ?? 0, 'hint' => $data['score']->level_code ?? 'seed'])
            @include('livewire.partials.stat-card', ['label' => 'Nhua da giam', 'value' => number_format($data['plastic'], 0).'g'])
            @include('livewire.partials.stat-card', ['label' => 'CO2 da giam', 'value' => number_format($data['co2'], 2).'kg'])
            @include('livewire.partials.stat-card', ['label' => 'Chuoi ngay xanh', 'value' => '7'])
            @include('livewire.partials.stat-card', ['label' => 'Voucher goi y', 'value' => $data['vouchers']->count()])
        </div>
        <div class="mt-8 grid gap-6 lg:grid-cols-[1.5fr_1fr]">
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="font-bold">Lich su giao dich gan nhat</h2>
                <div class="mt-4 divide-y">
                    @forelse ($data['transactions'] as $tx)
                        <div class="flex justify-between py-3 text-sm"><span>{{ $tx->description }}</span><strong class="text-emerald-700">+{{ $tx->points }}</strong></div>
                    @empty
                        <p class="py-6 text-slate-500">Chua co giao dich. Hay quet QR hoa don xanh dau tien.</p>
                    @endforelse
                </div>
            </div>
            <div class="rounded-2xl bg-emerald-900 p-6 text-white shadow-sm">
                <h2 class="font-bold">Goi y hanh dong xanh</h2>
                <p class="mt-3 text-emerald-100">Mang binh ca nhan, khong dung ong hut, tai che rac thai va di chuyen xanh de tang diem nhanh hon.</p>
                <a href="{{ route('user.scan-qr') }}" class="mt-5 inline-block rounded-xl bg-white px-4 py-2 font-semibold text-emerald-900">Quet QR</a>
            </div>
        </div>
    </section>
</div>
