<?php

namespace App\Livewire\Store\Branches;

use App\Models\ActivityLog;
use App\Models\Store;
use App\Models\StoreBranch;
use Livewire\Component;

class Index extends Component
{
    public ?int $editingId = null;

    public string $name = '';

    public string $address = '';

    public string $city = 'TP. Hồ Chí Minh';

    public string $district = '';

    public string $phone = '';

    public string $manager_name = '';

    public bool $is_active = true;

    private function store(): Store
    {
        return Store::where('owner_id', auth()->id())->firstOrFail();
    }

    public function edit(int $id): void
    {
        $branch = $this->store()->branches()->findOrFail($id);
        $this->editingId = $branch->id;
        $this->fill($branch->only(['name', 'address', 'city', 'district', 'phone', 'manager_name', 'is_active']));
    }

    public function save(): void
    {
        $data = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:100'],
            'district' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:30'],
            'manager_name' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $branch = $this->editingId
            ? $this->store()->branches()->findOrFail($this->editingId)
            : new StoreBranch(['store_id' => $this->store()->id]);
        $branch->fill($data)->save();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => $this->editingId ? 'update_branch' : 'create_branch',
            'description' => "Cập nhật chi nhánh {$branch->name}",
            'subject_type' => StoreBranch::class,
            'subject_id' => $branch->id,
        ]);

        session()->flash('success', 'Đã lưu chi nhánh.');
        $this->cancel();
    }

    public function toggle(int $id): void
    {
        $branch = $this->store()->branches()->findOrFail($id);
        $branch->update(['is_active' => ! $branch->is_active]);
    }

    public function cancel(): void
    {
        $this->reset(['editingId', 'name', 'address', 'district', 'phone', 'manager_name']);
        $this->city = 'TP. Hồ Chí Minh';
        $this->is_active = true;
        $this->resetValidation();
    }

    public function render()
    {
        $store = $this->store();

        return view('livewire.store.branches.index', [
            'store' => $store,
            'branches' => $store->branches()->latest()->get(),
        ]);
    }
}
