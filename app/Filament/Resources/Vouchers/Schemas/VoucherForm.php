<?php

namespace App\Filament\Resources\Vouchers\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class VoucherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('partner_id')
                    ->relationship('partner', 'name'),
                Select::make('store_id')
                    ->relationship('store', 'name'),
                TextInput::make('title')
                    ->required(),
                TextInput::make('code')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('category')
                    ->required()
                    ->default('other'),
                TextInput::make('required_points')
                    ->required()
                    ->numeric(),
                TextInput::make('discount_type')
                    ->required()
                    ->default('fixed'),
                TextInput::make('discount_value')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('quantity')
                    ->numeric(),
                TextInput::make('used_quantity')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('min_green_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('started_at'),
                DateTimePicker::make('expired_at'),
                TextInput::make('status')
                    ->required()
                    ->default('draft'),
                Textarea::make('terms')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image(),
            ]);
    }
}
