<?php

namespace App\Filament\Resources\GreenActionRules\Pages;

use App\Filament\Resources\GreenActionRules\GreenActionRuleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGreenActionRules extends ListRecords
{
    protected static string $resource = GreenActionRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
