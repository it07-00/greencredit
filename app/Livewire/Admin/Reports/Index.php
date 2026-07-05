<?php

namespace App\Livewire\Admin\Reports;

use App\Livewire\SimplePage;

class Index extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Admin Reports';
        $this->description = 'Bao cao tong hop theo thang, top cua hang xanh va top users.';
        $this->cards = [['Chart.js', 'Ready'], ['Top stores', 'Ready'], ['Top users', 'Ready']];
        $this->rows = [['Giao dich theo thang', 'Database', 'Report'], ['Hanh dong pho bien', 'Database', 'Report']];
    }
}
