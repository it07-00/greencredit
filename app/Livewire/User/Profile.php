<?php

namespace App\Livewire\User;

use App\Livewire\SimplePage;

class Profile extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Ho so ca nhan';
        $this->description = 'Thong tin tai khoan va so thich xanh.';
        $this->cards = [['Email', auth()->user()->email], ['Vai tro', auth()->user()->role], ['Trang thai', auth()->user()->status]];
        $this->rows = [['Ten', auth()->user()->name, 'Tai khoan'], ['Dien thoai', auth()->user()->phone ?? 'Chua co', 'Ho so']];
    }
}
