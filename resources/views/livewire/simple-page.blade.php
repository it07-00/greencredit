<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">Green Credit</p>
                <h1 class="mt-2 text-3xl font-bold text-slate-950">{{ $title }}</h1>
                <p class="mt-2 max-w-2xl text-slate-600">{{ $description }}</p>
            </div>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ($cards as $card)
                @include('livewire.partials.stat-card', ['label' => $card[0], 'value' => $card[1], 'hint' => $card[2] ?? null])
            @endforeach
        </div>
        <div class="mt-8 rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h2 class="text-lg font-bold">{{ $tableTitle ?? 'Du lieu gan day' }}</h2>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 text-slate-500">
                        <tr><th class="p-3">Noi dung</th><th class="p-3">Trang thai</th><th class="p-3">Cap nhat</th></tr>
                    </thead>
                    <tbody>
                    @forelse ($rows as $row)
                        <tr class="border-t"><td class="p-3 font-medium">{{ $row[0] }}</td><td class="p-3">{{ $row[1] }}</td><td class="p-3 text-slate-500">{{ $row[2] }}</td></tr>
                    @empty
                        <tr><td colspan="3" class="p-6 text-center text-slate-500">Chua co du lieu.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
