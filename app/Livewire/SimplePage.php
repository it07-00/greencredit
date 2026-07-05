<?php

namespace App\Livewire;

use Livewire\Component;

class SimplePage extends Component
{
    public string $title = 'Green Credit';

    public string $description = 'Trang quan ly trong he sinh thai Green Credit.';

    public array $cards = [];

    public array $rows = [];

    public string $tableTitle = 'Du lieu gan day';

    public function render()
    {
        return view('livewire.simple-page');
    }
}
