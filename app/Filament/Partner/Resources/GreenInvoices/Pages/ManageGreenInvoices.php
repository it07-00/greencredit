<?php

namespace App\Filament\Partner\Resources\GreenInvoices\Pages;

use App\Filament\Partner\Resources\GreenInvoices\GreenInvoiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageGreenInvoices extends ManageRecords
{
    protected static string $resource = GreenInvoiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
