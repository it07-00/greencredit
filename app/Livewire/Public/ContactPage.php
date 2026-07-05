<?php

namespace App\Livewire\Public;

use App\Livewire\SimplePage;

class ContactPage extends SimplePage
{
    public function mount(): void
    {
        $this->title = 'Lien he';
        $this->description = 'Thong tin lien he demo cho doi ngu Green Credit.';
        $this->cards = [['Email', 'hello@greencredit.test'], ['Hotline', '1900 0000'], ['Dia diem', 'TP.HCM']];
        $this->rows = [['Ho tro cua hang', 'Dang nhan yeu cau', '24h'], ['Hop tac voucher', 'Dang mo', '2026'], ['Bao cao gian lan', 'Admin Portal', 'Realtime']];
    }
}
