<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <h1 class="text-3xl font-bold">Admin Dashboard</h1>
        <div class="mt-6 grid gap-4 md:grid-cols-4">
            @foreach ([['Users',$overview['users']],['Stores',$overview['stores']],['Partners',$overview['partners']],['Invoices',$overview['invoices']],['Transactions',$overview['transactions']],['Points issued',$overview['points']],['Vouchers redeemed',$overview['redemptions']],['Fraud alerts open',$overview['fraud']]] as $item)
                @include('livewire.partials.stat-card', ['label' => $item[0], 'value' => $item[1]])
            @endforeach
        </div>
        <div class="mt-8 grid gap-5 lg:grid-cols-3">
            <a class="rounded-2xl bg-white p-6 ring-1 ring-slate-200" href="{{ route('admin.users') }}">Quan ly users</a>
            <a class="rounded-2xl bg-white p-6 ring-1 ring-slate-200" href="{{ route('admin.fraud-alerts') }}">Canh bao gian lan</a>
            <a class="rounded-2xl bg-white p-6 ring-1 ring-slate-200" href="{{ route('admin.green-action-rules') }}">Green action rules</a>
        </div>
    </section>
</div>
