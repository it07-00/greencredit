<?php

namespace App\Livewire\Partner;

use App\Livewire\SimplePage;

class Reports extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Báo cáo Đối tác';
        $this->description = 'Báo cáo hiệu quả voucher theo phân khúc Green Score.';
        $this->cards = [['Phân khúc', 'Sẵn sàng'], ['Tỷ lệ chuyển đổi', 'Sẵn sàng'], ['Top voucher', 'Sẵn sàng']];
        $this->rows = [['Thành viên Forest', 'Giá trị cao', 'Phân khúc'], ['Thành viên Leaf', 'Tăng trưởng', 'Phân khúc']];
    }
}
