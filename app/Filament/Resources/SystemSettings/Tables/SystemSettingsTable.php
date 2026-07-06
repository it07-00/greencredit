<?php

namespace App\Filament\Resources\SystemSettings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SystemSettingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->label('Khóa (Key)')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('value')
                    ->label('Giá trị (Value)')
                    ->limit(50)
                    ->searchable(),
                TextColumn::make('type')
                    ->label('Kiểu dữ liệu')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'string' => 'gray',
                        'integer' => 'info',
                        'boolean' => 'success',
                        'array' => 'warning',
                        default => 'gray',
                    })
                    ->searchable()
                    ->sortable(),
                TextColumn::make('group')
                    ->label('Nhóm cấu hình')
                    ->badge()
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
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
