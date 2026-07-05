<?php

namespace App\Filament\Partner\Resources\StoreStaffs\Pages;

use App\Filament\Partner\Resources\StoreStaffs\StoreStaffResource;
use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ManageRecords;
use Illuminate\Support\Facades\Hash;

class ManageStoreStaffs extends ManageRecords
{
    protected static string $resource = StoreStaffResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->mutateFormDataUsing(function (array $data): array {
                    $user = auth()->user();
                    if (!$user) {
                        return $data;
                    }
                    $store = \App\Models\Store::where('owner_id', $user->id)->first();
                    $data['store_id'] = $store?->id;

                    // Create related User account
                    $staffUser = User::create([
                        'name' => $data['staff_name'],
                        'email' => $data['staff_email'],
                        'password' => Hash::make($data['staff_password'] ?: '12345678'),
                        'role' => 'store_staff',
                        'status' => 'active',
                    ]);

                    $data['user_id'] = $staffUser->id;

                    // Unset custom form state attributes
                    unset($data['staff_name']);
                    unset($data['staff_email']);
                    unset($data['staff_password']);

                    return $data;
                }),
        ];
    }
}
