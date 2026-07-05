<?php

namespace App\Livewire\Admin\Settings;

use App\Livewire\SimplePage;
use App\Models\SystemSetting;

class Index extends SimplePage
{
    public function mount(): void
    {
        $settings = SystemSetting::latest()->get();
        $this->title = 'System Settings';
        $this->description = 'Cau hinh he thong va quy doi diem.';
        $this->cards = [['Settings', $settings->count()], ['Groups', $settings->pluck('group')->unique()->count()], ['Type json', $settings->where('type', 'json')->count()]];
        $this->rows = $settings->map(fn ($s) => [$s->key, $s->value, $s->group])->all();
    }
}
