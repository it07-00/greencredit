<?php

namespace App\Livewire\Admin\Transactions;

use App\Livewire\SimplePage;
use App\Models\GreenTransaction;

class Index extends SimplePage
{
    public function mount(): void
    {
        $txs = GreenTransaction::latest()->limit(100)->get();
        $this->title = 'Green Transactions';
        $this->description = 'Giao dịch điểm xanh trên toàn hệ thống.';
        $this->cards = [['Transactions', $txs->count()], ['Points', $txs->sum('points')], ['Suspicious', $txs->where('status', 'suspicious')->count()]];
        $this->rows = $txs->map(fn ($tx) => [$tx->transaction_code, $tx->points.' điểm', $tx->status])->all();
    }
}
