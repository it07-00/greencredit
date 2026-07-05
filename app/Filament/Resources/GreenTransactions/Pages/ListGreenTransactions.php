<?php

namespace App\Filament\Resources\GreenTransactions\Pages;

use App\Filament\Resources\GreenTransactions\GreenTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGreenTransactions extends ListRecords
{
    protected static string $resource = GreenTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
