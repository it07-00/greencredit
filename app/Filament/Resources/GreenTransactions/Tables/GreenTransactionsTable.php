<?php

namespace App\Filament\Resources\GreenTransactions\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GreenTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->searchable(),
                TextColumn::make('store.name')
                    ->searchable(),
                TextColumn::make('branch.name')
                    ->searchable(),
                TextColumn::make('greenInvoice.id')
                    ->searchable(),
                TextColumn::make('transaction_code')
                    ->searchable(),
                TextColumn::make('type')
                    ->searchable(),
                TextColumn::make('points')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('plastic_saved_grams')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('co2_saved_kg')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
