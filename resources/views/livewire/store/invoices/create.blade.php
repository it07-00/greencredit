<div>
    <section class="mx-auto grid max-w-7xl gap-6 px-4 py-10 lg:grid-cols-[1.1fr_.9fr]">
        <form wire:submit="create" class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h1 class="text-3xl font-bold">Tao hoa don xanh</h1>
            <select wire:model="branch_id" class="mt-6 w-full rounded-xl border-slate-200">
                <option value="">Chon chi nhanh</option>
                @foreach ($branches as $branch)<option value="{{ $branch->id }}">{{ $branch->name }}</option>@endforeach
            </select>
            <input wire:model.live="amount" type="number" class="mt-4 w-full rounded-xl border-slate-200" placeholder="So tien hoa don">
            <select wire:model="payment_method" class="mt-4 w-full rounded-xl border-slate-200">
                <option value="cash">Tien mat</option><option value="card">The</option><option value="wallet">Vi dien tu</option>
            </select>
            <div class="mt-5 grid gap-3 md:grid-cols-2">
                @foreach ($rules as $rule)
                    <label class="flex cursor-pointer gap-3 rounded-xl border p-4">
                        <input type="checkbox" wire:model.live="actions" value="{{ $rule->code }}">
                        <span><strong>{{ $rule->name }}</strong><br><span class="text-sm text-slate-500">+{{ $rule->points }} diem</span></span>
                    </label>
                @endforeach
            </div>
            @error('actions')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            <div class="mt-5 rounded-xl bg-emerald-50 p-4 text-emerald-900">Du kien: <strong>{{ $calculated['points'] }}</strong> diem, {{ $calculated['plastic_saved_grams'] }}g nhua, {{ $calculated['co2_saved_kg'] }}kg CO2</div>
            <button class="mt-5 rounded-xl bg-emerald-700 px-5 py-3 font-semibold text-white">Tao hoa don va QR</button>
        </form>
        <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
            <h2 class="font-bold">QR hoa don</h2>
            @if ($invoice)
                <p class="mt-4 text-sm text-slate-500">Invoice: {{ $invoice->invoice_code }}</p>
                <div class="mt-4 grid aspect-square max-w-xs place-items-center rounded-2xl bg-slate-950 p-4 text-center text-xs font-bold text-white">
                    GREEN-CREDIT:<br>{{ $invoice->qr_token }}
                </div>
                <input readonly class="mt-4 w-full rounded-xl border-slate-200" value="{{ $invoice->qr_token }}">
                <a href="{{ route('store.invoices.show', $invoice) }}" class="mt-4 inline-block rounded-xl border px-4 py-2 font-semibold">Xem hoa don</a>
            @else
                <p class="mt-4 text-slate-500">QR token se hien thi sau khi tao hoa don.</p>
            @endif
        </div>
    </section>
</div>
