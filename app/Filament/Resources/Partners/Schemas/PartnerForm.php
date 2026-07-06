<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('Tài khoản liên kết')
                    ->searchable()
                    ->preload(),
                TextInput::make('name')
                    ->label('Tên đối tác')
                    ->required(),
                Select::make('type')
                    ->label('Loại đối tác')
                    ->options([
                        'voucher' => 'Đối tác voucher',
                        'financial' => 'Đối tác tài chính',
                        'wallet' => 'Đối tác ví điện tử',
                        'other' => 'Khác',
                    ])
                    ->required()
                    ->default('voucher'),
                TextInput::make('contact_email')
                    ->label('Email liên hệ')
                    ->email(),
                TextInput::make('contact_phone')
                    ->label('Số điện thoại liên hệ')
                    ->tel(),
                TextInput::make('address')
                    ->label('Địa chỉ'),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->columnSpanFull(),
                TextInput::make('logo')
                    ->label('Đường dẫn Logo'),
                Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'active' => 'Hoạt động',
                        'inactive' => 'Ngừng hoạt động',
                        'pending' => 'Chờ duyệt',
                    ])
                    ->required()
                    ->default('pending'),
            ]);
    }
}
