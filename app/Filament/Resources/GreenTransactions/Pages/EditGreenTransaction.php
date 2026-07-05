<?php

namespace App\Filament\Resources\GreenTransactions\Pages;

use App\Filament\Resources\GreenTransactions\GreenTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGreenTransaction extends EditRecord
{
    protected static string $resource = GreenTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
