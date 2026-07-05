<?php

namespace App\Filament\Partner\Resources\StoreBranches\Pages;

use App\Filament\Partner\Resources\StoreBranches\StoreBranchResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageStoreBranches extends ManageRecords
{
    protected static string $resource = StoreBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $user = auth()->user();
                    if ($user && $user->role === 'store_owner') {
                        $store = \App\Models\Store::where('owner_id', $user->id)->first();
                        $data['store_id'] = $store?->id;
                    }
                    return $data;
                }),
        ];
    }
}
