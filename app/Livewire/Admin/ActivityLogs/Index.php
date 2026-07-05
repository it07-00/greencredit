<?php

namespace App\Livewire\Admin\ActivityLogs;

use App\Livewire\SimplePage;
use App\Models\ActivityLog;

class Index extends SimplePage
{
    public function mount(): void
    {
        $logs = ActivityLog::latest()->limit(100)->get();
        $this->title = 'Activity Logs';
        $this->description = 'Audit log cho login, create invoice, scan invoice, redeem voucher.';
        $this->cards = [['Logs', $logs->count()], ['Actions', $logs->pluck('action')->unique()->count()], ['Today', $logs->where('created_at', '>=', today())->count()]];
        $this->rows = $logs->map(fn ($l) => [$l->action, $l->description ?? '', $l->created_at->format('d/m/Y H:i')])->all();
    }
}
