<div>
    <section class="mx-auto max-w-3xl px-4 py-10">
        <div class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            <h1 class="text-3xl font-bold">{{ $invoice->invoice_code }}</h1>
            <p class="mt-2 text-slate-500">{{ $invoice->store->name }} - {{ $invoice->status }}</p>
            <div class="mt-6 grid gap-4 md:grid-cols-3">
                @include('livewire.partials.stat-card', ['label' => 'Diem', 'value' => $invoice->base_points])
                @include('livewire.partials.stat-card', ['label' => 'Nhua', 'value' => $invoice->plastic_saved_grams.'g'])
                @include('livewire.partials.stat-card', ['label' => 'CO2', 'value' => $invoice->co2_saved_kg.'kg'])
            </div>
            <div class="mt-6 rounded-2xl bg-slate-950 p-6 text-center text-white">
                <p class="text-sm text-slate-300">QR demo</p>
                <p class="mt-4 break-all font-bold">GREEN-CREDIT:{{ $invoice->qr_token }}</p>
            </div>
        </div>
    </section>
</div>
