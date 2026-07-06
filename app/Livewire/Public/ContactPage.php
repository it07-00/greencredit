<?php

namespace App\Livewire\Public;

use App\Livewire\SimplePage;

class ContactPage extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Liên hệ';
        $this->description = 'Thông tin liên hệ demo cho đội ngũ Green Credit.';
        $this->cards = [['Email', 'hello@greencredit.test'], ['Hotline', '1900 0000'], ['Địa điểm', 'TP.HCM']];
        $this->rows = [['Hỗ trợ cửa hàng', 'Đang nhận yêu cầu', '24h'], ['Hợp tác voucher', 'Đang mở', '2026'], ['Báo cáo gian lận', 'Admin Portal', 'Thời gian thực']];
    }
}
