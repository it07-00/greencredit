<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GreenInvoice extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'eco_actions' => 'array',
            'expired_at' => 'datetime',
            'used_at' => 'datetime',
            'amount' => 'decimal:2',
            'plastic_saved_grams' => 'decimal:2',
            'co2_saved_kg' => 'decimal:3',
        ];
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(StoreBranch::class, 'branch_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function usedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'used_by');
    }

    public function items(): HasMany
    {
        return $this->hasMany(GreenInvoiceItem::class);
    }
}
