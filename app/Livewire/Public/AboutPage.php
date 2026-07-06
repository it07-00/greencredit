<?php

namespace App\Livewire\Public;

use App\Livewire\SimplePage;

class AboutPage extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Về Green Credit';
        $this->description = 'Nền tảng quản lý điểm xanh, Green Score và Net Zero Planner phục vụ đồ án tốt nghiệp.';
        $this->cards = [['QR xanh', 'Có'], ['Score Engine', '0-1000'], ['Voucher', 'Thời gian thực']];
        $this->rows = [['Cửa hàng tạo QR', 'Hoàn thành', 'Phase 3'], ['Người dùng quét QR', 'Hoàn thành', 'Phase 3'], ['Admin báo cáo', 'Hoàn thành', 'Phase 6']];
    }
}
