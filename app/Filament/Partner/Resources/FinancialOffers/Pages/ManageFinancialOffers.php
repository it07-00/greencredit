<?php

namespace App\Filament\Partner\Resources\FinancialOffers\Pages;

use App\Filament\Partner\Resources\FinancialOffers\FinancialOfferResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageFinancialOffers extends ManageRecords
{
    protected static string $resource = FinancialOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $user = auth()->user();
                    if ($user && $user->role === 'partner') {
                        $partner = \App\Models\Partner::where('user_id', $user->id)->first();
                        $data['partner_id'] = $partner?->id;
                    }
                    return $data;
                }),
        ];
    }
}
