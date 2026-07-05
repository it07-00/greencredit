<?php

namespace App\Filament\Resources\GreenActionRules\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GreenActionRuleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('code')
                    ->required(),
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
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
                TextInput::make('category')
                    ->required()
                    ->default('other'),
                TextInput::make('daily_limit')
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
