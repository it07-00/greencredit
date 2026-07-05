<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TopGreenUsers extends TableWidget
{
    protected static ?string $heading = 'Top người dùng xanh';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => User::query()
                ->where('role', 'user')
                ->withSum('greenTransactions', 'points')
                ->withSum('greenTransactions', 'plastic_saved_grams')
                ->orderByDesc('green_transactions_sum_points')
                ->limit(10))
            ->columns([
                TextColumn::make('name')->label('Người dùng')->searchable()->weight('bold'),
                TextColumn::make('green_transactions_sum_points')->label('Green Points')->numeric()->badge()->color('warning'),
                TextColumn::make('green_transactions_sum_plastic_saved_grams')->label('Nhựa giảm (g)')->numeric(decimalPlaces: 1)->badge()->color('info'),
            ]);
    }
}
