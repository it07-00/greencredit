<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GreenInvoiceItem extends Model
{
    protected $guarded = [];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(GreenInvoice::class, 'green_invoice_id');
    }

    public function rule(): BelongsTo
    {
        return $this->belongsTo(GreenActionRule::class, 'green_action_rule_id');
    }
}
