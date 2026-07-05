<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GreenLevel extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['benefits' => 'array'];
    }
}
