<?php

namespace App\Livewire\User;

use App\Livewire\SimplePage;

class TransactionHistory extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Lịch sử điểm';
        $this->description = 'Tất cả giao dịch Green Points của bạn.';
        $txs = auth()->user()->greenTransactions()->latest()->get();
        $this->cards = [['Giao dịch', $txs->count()], ['Tổng điểm', $txs->sum('points')], ['CO2', number_format($txs->sum('co2_saved_kg'), 2).'kg']];
        $this->rows = $txs->map(fn ($tx) => [$tx->description, '+'.$tx->points.' điểm', $tx->created_at->format('d/m/Y H:i')])->all();
    }
}
