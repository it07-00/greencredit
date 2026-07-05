<?php

namespace App\Livewire\Partner;

use App\Livewire\SimplePage;

class Reports extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Partner Reports';
        $this->description = 'Bao cao hieu qua voucher theo phan khuc Green Score.';
        $this->cards = [['Segmentation', 'Ready'], ['Conversion', 'Ready'], ['Top voucher', 'Ready']];
        $this->rows = [['Forest users', 'High value', 'Segment'], ['Leaf users', 'Growth', 'Segment']];
    }
}
