<?php

namespace App\Livewire;

use Livewire\Component;

class SimplePage extends Component
{
    public string $title = 'Green Credit';

    public string $description = 'Trang quản lý trong hệ sinh thái Green Credit.';

    public array $cards = [];

    public array $rows = [];

    public string $tableTitle = 'Dữ liệu gần đây';

    public ?string $actionUrl = null;

    public ?string $actionText = null;

    public function render()
    {
        return view('livewire.simple-page');
    }
}
