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
        $this->description = 'Cấu hình hệ thống và quy đổi điểm.';
        $this->cards = [['Settings', $settings->count()], ['Groups', $settings->pluck('group')->unique()->count()], ['Type json', $settings->where('type', 'json')->count()]];
        $this->rows = $settings->map(fn ($s) => [$s->key, $s->value, $s->group])->all();
    }
}
