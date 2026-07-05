<x-layouts.app title="Dang nhap">
    <section class="mx-auto grid min-h-[80vh] max-w-6xl items-center gap-8 px-4 py-12 md:grid-cols-2">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">Green Credit Platform</p>
            <h1 class="mt-3 text-4xl font-bold text-slate-950">Dang nhap de tiep tuc song xanh</h1>
            <p class="mt-4 text-slate-600">Dung tai khoan demo trong README hoac tu tao tai khoan nguoi dung moi.</p>
        </div>
        <form method="post" action="{{ route('login') }}" class="rounded-2xl bg-white p-8 shadow-sm ring-1 ring-slate-200">
            @csrf
            <label class="block text-sm font-semibold">Email</label>
            <input name="email" type="email" class="mt-2 w-full rounded-xl border-slate-200" value="{{ old('email') }}" required>
            <label class="mt-4 block text-sm font-semibold">Mat khau</label>
            <input name="password" type="password" class="mt-2 w-full rounded-xl border-slate-200" required>
            @error('email')<p class="mt-3 text-sm text-red-600">{{ $message }}</p>@enderror
            <button class="mt-6 w-full rounded-xl bg-emerald-700 px-5 py-3 font-semibold text-white">Dang nhap</button>
        </form>
    </section>
</x-layouts.app>
