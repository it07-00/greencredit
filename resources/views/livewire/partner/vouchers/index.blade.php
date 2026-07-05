<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-6"><p class="text-sm font-bold uppercase tracking-wide text-emerald-700">{{ $partner->name }}</p><h1 class="mt-2 text-3xl font-black">Voucher mô phỏng</h1><p class="mt-2 text-slate-600">Tạo ưu đãi demo; không liên kết thương hiệu hay hệ thống thanh toán thật.</p></div>
        @if(session('success'))<div class="mb-5 rounded-xl bg-emerald-100 px-4 py-3 text-emerald-900">{{ session('success') }}</div>@endif
        <div class="grid gap-6 xl:grid-cols-[400px_1fr]">
            <form wire:submit="save" class="h-fit rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-lg font-bold">{{ $editingId ? 'Cập nhật voucher' : 'Tạo voucher mới' }}</h2>
                <div class="mt-4 grid gap-4 md:grid-cols-2">
                    <label class="text-sm font-semibold md:col-span-2">Tên voucher<input wire:model="title" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Mã voucher<input wire:model="code" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Danh mục<select wire:model="category" class="mt-1 w-full rounded-xl border-slate-200"><option value="cafe">Cà phê</option><option value="milk_tea">Trà sữa</option><option value="supermarket">Siêu thị</option><option value="wallet">Ví mô phỏng</option><option value="transport">Di chuyển</option><option value="finance">Tài chính mô phỏng</option><option value="other">Khác</option></select></label>
                    <label class="text-sm font-semibold">Điểm cần đổi<input wire:model="required_points" type="number" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Green Score tối thiểu<input wire:model="min_green_score" type="number" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Loại giảm<select wire:model="discount_type" class="mt-1 w-full rounded-xl border-slate-200"><option value="fixed">Số tiền</option><option value="percent">Phần trăm</option><option value="cashback">Hoàn điểm</option><option value="other">Khác</option></select></label>
                    <label class="text-sm font-semibold">Giá trị<input wire:model="discount_value" type="number" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Số lượng<input wire:model="quantity" type="number" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold">Hết hạn<input wire:model="expired_at" type="date" class="mt-1 w-full rounded-xl border-slate-200"></label>
                    <label class="text-sm font-semibold md:col-span-2">Trạng thái<select wire:model="status" class="mt-1 w-full rounded-xl border-slate-200"><option value="draft">Bản nháp</option><option value="active">Hoạt động</option><option value="inactive">Tạm dừng</option><option value="expired">Hết hạn</option></select></label>
                    <label class="text-sm font-semibold md:col-span-2">Mô tả<textarea wire:model="description" class="mt-1 w-full rounded-xl border-slate-200"></textarea></label>
                </div>
                @if($errors->any())<div class="mt-4 rounded-xl bg-red-50 p-3 text-sm text-red-700">{{ $errors->first() }}</div>@endif
                <div class="mt-5 flex gap-2"><button class="rounded-xl bg-emerald-700 px-5 py-3 font-bold text-white">Lưu voucher</button>@if($editingId)<button wire:click="cancel" type="button" class="rounded-xl border px-4 py-3">Hủy</button>@endif</div>
            </form>
            <div class="grid gap-4 md:grid-cols-2">
                @forelse($vouchers as $voucher)<article class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200"><div class="flex justify-between gap-3"><span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700">{{ $voucher->status }}</span><span class="text-sm text-slate-500">Đã đổi {{ $voucher->used_quantity }}/{{ $voucher->quantity ?? '∞' }}</span></div><h3 class="mt-4 text-lg font-bold">{{ $voucher->title }}</h3><p class="mt-2 text-sm text-slate-600">{{ $voucher->description }}</p><div class="mt-4 flex items-end justify-between"><div><strong class="text-emerald-700">{{ number_format($voucher->required_points) }} điểm</strong><p class="text-xs text-slate-500">Score tối thiểu {{ $voucher->min_green_score }}</p></div><button wire:click="edit({{ $voucher->id }})" class="rounded-lg border px-3 py-2 text-sm">Sửa</button></div></article>@empty<div class="col-span-full rounded-2xl bg-slate-50 p-10 text-center text-slate-500">Chưa có voucher.</div>@endforelse
            </div>
        </div>
    </section>
</div>
