<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function before(User $user): ?bool
    {
        return $user->role === 'super_admin' ? true : null;
    }

    public function viewAny(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function view(User $user, User $model): bool
    {
        return $user->role === 'admin';
    }

    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    public function update(User $user, User $model): bool
    {
        return $user->role === 'admin' && $model->role !== 'super_admin';
    }

    public function delete(User $user, User $model): bool
    {
        return $user->role === 'admin' && $model->role !== 'super_admin' && ! $user->is($model);
    }

    public function deleteAny(User $user): bool
    {
        return false;
    }
}
