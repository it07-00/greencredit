<?php

namespace App\Livewire\User;

use App\Livewire\SimplePage;

class TransactionHistory extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Lich su diem';
        $this->description = 'Tat ca giao dich Green Points cua ban.';
        $txs = auth()->user()->greenTransactions()->latest()->get();
        $this->cards = [['Giao dich', $txs->count()], ['Tong diem', $txs->sum('points')], ['CO2', number_format($txs->sum('co2_saved_kg'), 2).'kg']];
        $this->rows = $txs->map(fn ($tx) => [$tx->description, '+'.$tx->points.' diem', $tx->created_at->format('d/m/Y H:i')])->all();
    }
}
