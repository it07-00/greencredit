<?php

namespace App\Filament\Resources\SystemSettings\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SystemSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->label('Khóa (Key)')
                    ->required()
                    ->placeholder('site_phone, site_email,...'),
                Textarea::make('value')
                    ->label('Giá trị (Value)')
                    ->columnSpanFull(),
                Select::make('type')
                    ->label('Kiểu dữ liệu')
                    ->options([
                        'string' => 'Chuỗi (String)',
                        'integer' => 'Số nguyên (Integer)',
                        'boolean' => 'Logic (Boolean)',
                        'array' => 'Mảng (Array)',
                    ])
                    ->required()
                    ->default('string'),
                TextInput::make('group')
                    ->label('Nhóm cấu hình')
                    ->placeholder('contact, wallet, general,...'),
            ]);
    }
}
