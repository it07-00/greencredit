<?php

namespace App\Filament\Resources\FraudAlerts\Pages;

use App\Filament\Resources\FraudAlerts\FraudAlertResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFraudAlerts extends ListRecords
{
    protected static string $resource = FraudAlertResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
