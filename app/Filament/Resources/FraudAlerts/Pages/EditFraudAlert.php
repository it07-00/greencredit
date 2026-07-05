<?php

namespace App\Filament\Resources\FraudAlerts\Pages;

use App\Filament\Resources\FraudAlerts\FraudAlertResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFraudAlert extends EditRecord
{
    protected static string $resource = FraudAlertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
