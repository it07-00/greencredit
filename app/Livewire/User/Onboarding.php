<?php

namespace App\Livewire\User;

use App\Livewire\SimplePage;

class Onboarding extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Onboarding';
        $this->description = 'Hoan tat ho so, muc tieu xanh va vi diem.';
        $this->cards = [['Ho so', '1'], ['Muc tieu xanh', '4'], ['Vi diem', 'Active']];
        $this->rows = [['Tao tai khoan', 'Hoan thanh', 'Buoc 1'], ['Chon muc tieu xanh', 'Demo', 'Buoc 2'], ['Lap Net Zero Goal', 'Tu dong', 'Buoc 3']];
    }
}
