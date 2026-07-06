<?php

namespace App\Filament\Resources\Partners\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PartnersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Tài khoản liên kết')
                    ->searchable(),
                TextColumn::make('name')
                    ->label('Tên đối tác')
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Loại đối tác')
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'voucher' => 'Đối tác voucher',
                        'financial' => 'Đối tác tài chính',
                        'wallet' => 'Đối tác ví điện tử',
                        default => 'Khác',
                    })
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'voucher' => 'success',
                        'financial' => 'info',
                        'wallet' => 'warning',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('contact_email')
                    ->label('Email liên hệ')
                    ->searchable(),
                TextColumn::make('contact_phone')
                    ->label('Số điện thoại')
                    ->searchable(),
                TextColumn::make('address')
                    ->label('Địa chỉ')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'inactive' => 'danger',
                        'pending' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Hoạt động',
                        'inactive' => 'Ngừng hoạt động',
                        'pending' => 'Chờ duyệt',
                        default => $state,
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
