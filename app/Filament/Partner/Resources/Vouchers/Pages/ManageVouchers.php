<?php

namespace App\Filament\Partner\Resources\Vouchers\Pages;

use App\Filament\Partner\Resources\Vouchers\VoucherResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;

class ManageVouchers extends ManageRecords
{
    protected static string $resource = VoucherResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $user = auth()->user();
                    if (!$user) {
                        return $data;
                    }

                    if ($user->role === 'partner') {
                        $partner = \App\Models\Partner::where('user_id', $user->id)->first();
                        $data['partner_id'] = $partner?->id;
                        $data['store_id'] = null;
                    } elseif ($user->role === 'store_owner') {
                        $store = \App\Models\Store::where('owner_id', $user->id)->first();
                        $data['store_id'] = $store?->id;
                        $data['partner_id'] = null;
                    }

                    return $data;
                }),
        ];
    }
}
