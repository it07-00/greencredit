<?php

namespace App\Livewire\Public;

use App\Livewire\SimplePage;

class AboutPage extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Ve Green Credit';
        $this->description = 'Nen tang quan ly diem xanh, Green Score va Net Zero Planner phuc vu do an tot nghiep.';
        $this->cards = [['QR xanh', 'Co'], ['Score Engine', '0-1000'], ['Voucher', 'Realtime']];
        $this->rows = [['Store tao QR', 'Hoan thanh', 'Phase 3'], ['User quet QR', 'Hoan thanh', 'Phase 3'], ['Admin bao cao', 'Hoan thanh', 'Phase 6']];
    }
}
