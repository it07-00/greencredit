<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreenActionRule extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'plastic_saved_grams' => 'decimal:2',
            'co2_saved_kg' => 'decimal:3',
        ];
    }
}
