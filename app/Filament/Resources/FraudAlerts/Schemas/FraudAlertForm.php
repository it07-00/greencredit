<?php

namespace App\Filament\Resources\FraudAlerts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FraudAlertForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->numeric(),
                TextInput::make('green_invoice_id')
                    ->numeric(),
                TextInput::make('store_id')
                    ->numeric(),
                TextInput::make('alert_type')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('risk_score')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('open'),
                TextInput::make('resolved_by')
                    ->numeric(),
                DateTimePicker::make('resolved_at'),
            ]);
    }
}
