<?php

namespace App\Filament\Resources\GreenTransactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GreenTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Select::make('store_id')
                    ->relationship('store', 'name'),
                Select::make('branch_id')
                    ->relationship('branch', 'name'),
                Select::make('green_invoice_id')
                    ->relationship('greenInvoice', 'id'),
                TextInput::make('transaction_code')
                    ->required(),
                TextInput::make('type')
                    ->required()
                    ->default('invoice_scan'),
                TextInput::make('points')
                    ->required()
                    ->numeric(),
                TextInput::make('plastic_saved_grams')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('co2_saved_kg')
                    ->required()
                    ->numeric()
                    ->default(0),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required()
                    ->default('approved'),
                Textarea::make('metadata')
                    ->columnSpanFull(),
            ]);
    }
}
