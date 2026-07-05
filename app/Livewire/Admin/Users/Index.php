<?php

namespace App\Livewire\Admin\Users;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public ?int $editingId = null;

    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $role = 'user';

    public string $status = 'active';

    public string $password = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function edit(int $id): void
    {
        $user = User::findOrFail($id);
        $this->editingId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone ?? '';
        $this->role = $user->role;
        $this->status = $user->status;
        $this->password = '';
    }

    public function save(): void
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->editingId)],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['required', Rule::in(['super_admin', 'admin', 'user', 'store_owner', 'store_staff', 'partner'])],
            'status' => ['required', Rule::in(['active', 'inactive', 'banned'])],
            'password' => [$this->editingId ? 'nullable' : 'required', 'nullable', 'string', 'min:8'],
        ]);

        $target = $this->editingId ? User::findOrFail($this->editingId) : new User;
        if ($target->exists && $target->role === 'super_admin' && auth()->user()->role !== 'super_admin') {
            abort(403, 'Chỉ super admin được chỉnh sửa tài khoản super admin.');
        }

        $target->fill(collect($data)->except('password')->all());
        if ($data['password'] !== '') {
            $target->password = Hash::make($data['password']);
        }
        $target->save();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $this->editingId ? 'update_user' : 'create_user',
            'description' => "Cập nhật người dùng {$target->email}",
            'subject_type' => User::class,
            'subject_id' => $target->id,
        ]);

        session()->flash('success', 'Đã lưu thông tin người dùng.');
        $this->cancelEdit();
    }

    public function toggleStatus(int $id): void
    {
        $user = User::findOrFail($id);
        abort_if($user->role === 'super_admin', 403, 'Không thể khóa super admin.');
        abort_if($user->is(auth()->user()), 422, 'Không thể tự khóa tài khoản đang đăng nhập.');
        $user->update(['status' => $user->status === 'active' ? 'inactive' : 'active']);
    }

    public function delete(int $id): void
    {
        $user = User::findOrFail($id);
        abort_if($user->role === 'super_admin' || $user->is(auth()->user()), 403, 'Không thể xóa tài khoản này.');
        $user->delete();
        session()->flash('success', 'Đã xóa người dùng.');
    }

    public function cancelEdit(): void
    {
        $this->reset(['editingId', 'name', 'email', 'phone', 'password']);
        $this->role = 'user';
        $this->status = 'active';
        $this->resetValidation();
    }

    public function render()
    {
        $users = User::query()
            ->when($this->search, fn ($query) => $query->where(fn ($nested) => $nested
                ->where('name', 'like', "%{$this->search}%")
                ->orWhere('email', 'like', "%{$this->search}%")))
            ->latest()
            ->paginate(12);

        return view('livewire.admin.users.index', compact('users'));
    }
}
