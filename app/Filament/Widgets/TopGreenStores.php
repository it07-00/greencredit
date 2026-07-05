<?php

namespace App\Filament\Widgets;

use App\Models\Store;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class TopGreenStores extends TableWidget
{
    protected static ?string $heading = 'Top cửa hàng xanh';

    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Store::query()
                ->withCount('invoices')
                ->withSum('invoices', 'base_points')
                ->withSum('invoices', 'co2_saved_kg')
                ->withSum('invoices', 'plastic_saved_grams')
                ->orderByDesc('invoices_sum_base_points')
                ->limit(10))
            ->columns([
                TextColumn::make('name')->label('Cửa hàng')->searchable()->weight('bold'),
                TextColumn::make('invoices_count')->label('Hóa đơn')->numeric()->badge()->color('info'),
                TextColumn::make('invoices_sum_base_points')->label('Điểm phát hành')->numeric()->badge()->color('warning'),
                TextColumn::make('invoices_sum_co2_saved_kg')->label('CO₂ giảm (kg)')->numeric(decimalPlaces: 2)->badge()->color('success'),
                TextColumn::make('invoices_sum_plastic_saved_grams')->label('Nhựa giảm (g)')->numeric(decimalPlaces: 0)->badge()->color('info'),
            ]);
    }
}
