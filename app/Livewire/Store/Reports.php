<?php

namespace App\Livewire\Store;

use App\Livewire\SimplePage;

class Reports extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Bao cao cua hang';
        $this->description = 'Bao cao hoa don, diem, nhua va CO2 theo cua hang.';
        $this->cards = [['Bieu do', 'Chart.js'], ['Xuat file', 'Mo phong'], ['Top chi nhanh', 'Co']];
        $this->rows = [['Hoa don theo ngay', 'San sang', 'Report'], ['Top hanh dong xanh', 'San sang', 'Report']];
    }
}
