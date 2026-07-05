<?php

namespace App\Livewire\Admin\FraudAlerts;

use App\Livewire\SimplePage;
use App\Models\FraudAlert;

class Index extends SimplePage
{
    public function mount(): void
    {
        $alerts = FraudAlert::latest()->get();
        $this->title = 'Fraud Alerts';
        $this->description = 'Canh bao duplicate scan, expired invoice va tan suat bat thuong.';
        $this->cards = [['Alerts', $alerts->count()], ['Open', $alerts->where('status', 'open')->count()], ['Risk total', $alerts->sum('risk_score')]];
        $this->rows = $alerts->map(fn ($a) => [$a->alert_type, $a->risk_score.' risk', $a->status])->all();
    }
}
