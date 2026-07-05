<?php

namespace App\Filament\Resources\FraudAlerts\Pages;

use App\Filament\Resources\FraudAlerts\FraudAlertResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFraudAlert extends CreateRecord
{
    protected static string $resource = FraudAlertResource::class;
}
