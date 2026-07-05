<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->label('Họ tên')->searchable()->sortable(),
            TextColumn::make('email')->label('Email')->searchable(),
            TextColumn::make('phone')->label('Điện thoại')->toggleable(),
            TextColumn::make('role')->label('Vai trò')->badge()->sortable(),
            TextColumn::make('status')->label('Trạng thái')->badge()->color(fn (string $state) => match ($state) {
                'active' => 'success', 'banned' => 'danger', default => 'warning',
            }),
            TextColumn::make('created_at')->label('Ngày tạo')->dateTime('d/m/Y H:i')->sortable(),
        ])->filters([
            SelectFilter::make('role')->label('Vai trò')->options([
                'super_admin' => 'Super Admin', 'admin' => 'Admin', 'user' => 'Người dùng',
                'store_owner' => 'Chủ cửa hàng', 'store_staff' => 'Nhân viên', 'partner' => 'Đối tác',
            ]),
            SelectFilter::make('status')->label('Trạng thái')->options(['active' => 'Hoạt động', 'inactive' => 'Tạm khóa', 'banned' => 'Bị cấm']),
        ])->recordActions([EditAction::make()])->toolbarActions([
            BulkActionGroup::make([DeleteBulkAction::make()]),
        ]);
    }
}
