<?php

namespace App\Filament\Resources\GreenActionRules\Pages;

use App\Filament\Resources\GreenActionRules\GreenActionRuleResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGreenActionRule extends EditRecord
{
    protected static string $resource = GreenActionRuleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
