<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NetZeroProgress extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['progress_date' => 'date'];
    }
}
