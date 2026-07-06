<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password', 'phone', 'avatar', 'role', 'status'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected static function booted(): void
    {
        static::created(function (User $user): void {
            GreenWallet::firstOrCreate(['user_id' => $user->id]);
        });
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function profile(): HasOne
    {
        return $this->hasOne(UserProfile::class);
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(GreenWallet::class);
    }

    public function greenTransactions(): HasMany
    {
        return $this->hasMany(GreenTransaction::class);
    }

    public function greenPoints(): HasMany
    {
        return $this->hasMany(GreenPoint::class);
    }

    public function voucherRedemptions(): HasMany
    {
        return $this->hasMany(VoucherRedemption::class);
    }

    public function greenScoreHistories(): HasMany
    {
        return $this->hasMany(GreenScoreHistory::class);
    }

    public function getCurrentGreenScoreAttribute(): int
    {
        return (int) ($this->greenScoreHistories()->latest('calculated_at')->value('score') ?? 0);
    }

    public function netZeroGoals(): HasMany
    {
        return $this->hasMany(NetZeroGoal::class);
    }

    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'super_admin'], true);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->status !== 'active') {
            return false;
        }

        if ($panel->getId() === 'admin') {
            return in_array($this->role, ['admin', 'super_admin'], true);
        }

        if ($panel->getId() === 'partner') {
            return in_array($this->role, ['store_owner', 'store_staff', 'partner'], true);
        }

        return false;
    }
}
