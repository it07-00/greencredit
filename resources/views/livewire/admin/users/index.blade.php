<div>
    <section class="mx-auto max-w-7xl px-4 py-10">
        <div class="mb-6"><p class="text-sm font-bold uppercase tracking-wide text-emerald-700">Quản trị hệ thống</p><h1 class="mt-2 text-3xl font-black">Quản lý người dùng</h1><p class="mt-2 text-slate-600">Tạo tài khoản, phân vai trò và kiểm soát trạng thái truy cập.</p></div>

        @if (session('success'))<div class="mb-5 rounded-xl bg-emerald-100 px-4 py-3 text-emerald-900">{{ session('success') }}</div>@endif

        <div class="grid gap-6 lg:grid-cols-[360px_1fr]">
            <form wire:submit="save" class="h-fit rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <h2 class="text-lg font-bold">{{ $editingId ? 'Cập nhật tài khoản' : 'Tạo tài khoản mới' }}</h2>
                <div class="mt-4 grid gap-4">
                    <label class="text-sm font-semibold">Họ tên<input wire:model="name" class="mt-1 w-full rounded-xl border-slate-200" type="text"></label>@error('name')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    <label class="text-sm font-semibold">Email<input wire:model="email" class="mt-1 w-full rounded-xl border-slate-200" type="email"></label>@error('email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    <label class="text-sm font-semibold">Điện thoại<input wire:model="phone" class="mt-1 w-full rounded-xl border-slate-200" type="text"></label>
                    <label class="text-sm font-semibold">Vai trò<select wire:model="role" class="mt-1 w-full rounded-xl border-slate-200"><option value="user">Người dùng</option><option value="store_owner">Chủ cửa hàng</option><option value="store_staff">Nhân viên cửa hàng</option><option value="partner">Đối tác</option><option value="admin">Admin</option><option value="super_admin">Super admin</option></select></label>
                    <label class="text-sm font-semibold">Trạng thái<select wire:model="status" class="mt-1 w-full rounded-xl border-slate-200"><option value="active">Hoạt động</option><option value="inactive">Tạm khóa</option><option value="banned">Cấm</option></select></label>
                    <label class="text-sm font-semibold">Mật khẩu {{ $editingId ? '(để trống nếu giữ nguyên)' : '' }}<input wire:model="password" class="mt-1 w-full rounded-xl border-slate-200" type="password"></label>@error('password')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="mt-5 flex gap-2"><button class="rounded-xl bg-emerald-700 px-5 py-3 font-bold text-white" type="submit">Lưu tài khoản</button>@if($editingId)<button wire:click="cancelEdit" class="rounded-xl border px-4 py-3" type="button">Hủy</button>@endif</div>
            </form>

            <div class="rounded-2xl bg-white p-6 shadow-sm ring-1 ring-slate-200">
                <input wire:model.live.debounce.300ms="search" class="mb-5 w-full rounded-xl border-slate-200" type="search" placeholder="Tìm theo tên hoặc email...">
                <div class="overflow-x-auto"><table class="w-full text-left text-sm"><thead class="bg-slate-50 text-slate-500"><tr><th class="p-3">Người dùng</th><th class="p-3">Vai trò</th><th class="p-3">Trạng thái</th><th class="p-3 text-right">Thao tác</th></tr></thead><tbody>
                    @foreach($users as $user)<tr class="border-t"><td class="p-3"><strong>{{ $user->name }}</strong><div class="text-slate-500">{{ $user->email }}</div></td><td class="p-3">{{ $user->role }}</td><td class="p-3"><span class="rounded-full px-3 py-1 text-xs font-bold {{ $user->status === 'active' ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' }}">{{ $user->status }}</span></td><td class="p-3"><div class="flex justify-end gap-2"><button wire:click="edit({{ $user->id }})" class="rounded-lg border px-3 py-2">Sửa</button>@if($user->role !== 'super_admin' && $user->id !== auth()->id())<button wire:click="toggleStatus({{ $user->id }})" class="rounded-lg border border-amber-200 px-3 py-2 text-amber-700">{{ $user->status === 'active' ? 'Khóa' : 'Mở' }}</button><button wire:click="delete({{ $user->id }})" wire:confirm="Bạn chắc chắn muốn xóa tài khoản này?" class="rounded-lg border border-red-200 px-3 py-2 text-red-700">Xóa</button>@endif</div></td></tr>@endforeach
                </tbody></table></div>
                <div class="mt-5">{{ $users->links() }}</div>
            </div>
        </div>
    </section>
</div>
