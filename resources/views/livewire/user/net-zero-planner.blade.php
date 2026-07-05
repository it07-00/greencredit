<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <h1 class="text-3xl font-bold">Net Zero Planner</h1>
        <div class="mt-6 grid gap-4 md:grid-cols-4">
            @include('livewire.partials.stat-card', ['label' => 'Muc tieu nhua', 'value' => $goal->plastic_target_grams.'g'])
            @include('livewire.partials.stat-card', ['label' => 'Muc tieu CO2', 'value' => $goal->co2_target_kg.'kg'])
            @include('livewire.partials.stat-card', ['label' => 'Muc tieu diem', 'value' => $goal->points_target])
            @include('livewire.partials.stat-card', ['label' => 'Hanh dong', 'value' => $goal->action_target])
        </div>
        <div class="mt-8 grid gap-5 lg:grid-cols-2">
            <div class="rounded-2xl bg-white p-6 ring-1 ring-slate-200">
                <h2 class="font-bold">Recommendations</h2>
                <div class="mt-4 space-y-3">
                    @foreach ($recommendations as $item)
                        <div class="rounded-xl border p-4">
                            <div class="flex justify-between gap-3"><strong>{{ $item->title }}</strong><span>{{ $item->status }}</span></div>
                            <p class="mt-1 text-sm text-slate-600">{{ $item->description }}</p>
                            <button wire:click="apply({{ $item->id }})" class="mt-3 rounded-lg bg-emerald-700 px-3 py-2 text-sm font-semibold text-white">Ap dung</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="rounded-2xl bg-white p-6 ring-1 ring-slate-200">
                <h2 class="font-bold">Lo trinh Net Zero ca nhan</h2>
                <div class="mt-4 space-y-3">
                    @foreach (['Nhan thuc', 'Tiet giam', 'Toi uu', 'Bu dap', 'Net Zero'] as $step)
                        <div class="rounded-xl bg-emerald-50 p-4 font-semibold text-emerald-900">{{ $step }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</div>
