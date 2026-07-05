<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Thông tin tài khoản')->schema([
                TextInput::make('name')->label('Họ tên')->required()->maxLength(255),
                TextInput::make('email')->label('Email')->email()->required()->unique(ignoreRecord: true),
                TextInput::make('phone')->label('Điện thoại')->tel()->maxLength(30),
                TextInput::make('password')->label('Mật khẩu')->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->minLength(8),
                Select::make('role')->label('Vai trò')->required()->options([
                    'super_admin' => 'Super Admin', 'admin' => 'Admin', 'user' => 'Người dùng',
                    'store_owner' => 'Chủ cửa hàng', 'store_staff' => 'Nhân viên cửa hàng', 'partner' => 'Đối tác',
                ])->default('user'),
                Select::make('status')->label('Trạng thái')->required()->options([
                    'active' => 'Hoạt động', 'inactive' => 'Tạm khóa', 'banned' => 'Bị cấm',
                ])->default('active'),
            ])->columns(2),
        ]);
    }
}
