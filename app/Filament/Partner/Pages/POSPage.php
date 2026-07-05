<?php

namespace App\Filament\Partner\Pages;

use Filament\Pages\Page;

class POSPage extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calculator';

    protected static ?string $navigationLabel = 'Hệ thống POS';

    protected static ?string $title = 'Hệ thống POS';

    protected string $view = 'filament.partner.pages.p-o-s-page';

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(auth()->user()?->role, ['store_owner', 'store_staff']);
    }
}
