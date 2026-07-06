<?php

namespace App\Livewire\User;

use App\Livewire\SimplePage;

class Onboarding extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Onboarding';
        $this->description = 'Hoàn tất hồ sơ, mục tiêu xanh và ví điểm.';
        $this->cards = [['Hồ sơ', '1'], ['Mục tiêu xanh', '4'], ['Ví điểm', 'Hoạt động']];
        $this->rows = [['Tạo tài khoản', 'Hoàn thành', 'Bước 1'], ['Chọn mục tiêu xanh', 'Demo', 'Bước 2'], ['Lập Net Zero Goal', 'Tự động', 'Bước 3']];
    }
}
