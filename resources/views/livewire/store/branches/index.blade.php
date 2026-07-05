<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-6"><p class="text-sm font-bold uppercase tracking-wide text-emerald-700">{{ $store->name }}</p><h1 class="mt-2 text-3xl font-black">Quản lý chi nhánh</h1><p class="mt-2 text-slate-600">Mọi chi nhánh dưới đây chỉ thuộc cửa hàng đang đăng nhập.</p></div>
        @if(session('success'))<div class="mb-5 rounded-xl bg-emerald-100 px-4 py-3 text-emerald-900">{{ session('success') }}</div>@endif
        <div class="grid gap-6 lg:grid-cols-[360px_1fr]">
            <form wire:submit="save" class="h-fit rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-lg font-bold">{{ $editingId ? 'Cập nhật chi nhánh' : 'Thêm chi nhánh' }}</h2>
                <div class="mt-4 grid gap-4">
                    <label class="text-sm font-semibold">Tên chi nhánh<input wire:model="name" class="mt-1 w-full rounded-xl border-slate-200"></label>@error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    <label class="text-sm font-semibold">Địa chỉ<input wire:model="address" class="mt-1 w-full rounded-xl border-slate-200"></label>@error('address')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    <label class="text-sm font-semibold">Thành phố<input wire:model="city" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Quận/Huyện<input wire:model="district" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Điện thoại<input wire:model="phone" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Người quản lý<input wire:model="manager_name" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="flex items-center gap-2 text-sm font-semibold"><input wire:model="is_active" type="checkbox"> Đang hoạt động</label>
                </div>
                <div class="mt-5 flex gap-2"><button class="rounded-xl bg-emerald-700 px-5 py-3 font-bold text-white">Lưu chi nhánh</button>@if($editingId)<button wire:click="cancel" type="button" class="rounded-xl border px-4 py-3">Hủy</button>@endif</div>
            </form>
            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <div class="grid gap-4 md:grid-cols-2">
                    @forelse($branches as $branch)
                        <article class="rounded-2xl border border-slate-200 p-5"><div class="flex items-start justify-between gap-3"><div><h3 class="font-bold">{{ $branch->name }}</h3><p class="mt-1 text-sm text-slate-500">{{ $branch->address }}</p></div><span class="rounded-full px-3 py-1 text-xs font-bold {{ $branch->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ $branch->is_active ? 'Hoạt động' : 'Tạm dừng' }}</span></div><p class="mt-3 text-sm">Quản lý: {{ $branch->manager_name ?: 'Chưa thiết lập' }}</p><div class="mt-4 flex gap-2"><button wire:click="edit({{ $branch->id }})" class="rounded-lg border px-3 py-2 text-sm">Sửa</button><button wire:click="toggle({{ $branch->id }})" class="rounded-lg border border-amber-200 px-3 py-2 text-sm text-amber-700">{{ $branch->is_active ? 'Tạm dừng' : 'Kích hoạt' }}</button></div></article>
                    @empty
                        <div class="col-span-full rounded-2xl bg-slate-50 p-10 text-center text-slate-500">Chưa có chi nhánh. Hãy tạo chi nhánh đầu tiên.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
</div>
