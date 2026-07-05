<?php

namespace App\Filament\Resources\FraudAlerts;

use App\Filament\Resources\FraudAlerts\Pages\CreateFraudAlert;
use App\Filament\Resources\FraudAlerts\Pages\EditFraudAlert;
use App\Filament\Resources\FraudAlerts\Pages\ListFraudAlerts;
use App\Filament\Resources\FraudAlerts\Schemas\FraudAlertForm;
use App\Filament\Resources\FraudAlerts\Tables\FraudAlertsTable;
use App\Models\FraudAlert;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FraudAlertResource extends Resource
{
    protected static ?string $model = FraudAlert::class;

    protected static ?string $navigationLabel = 'Cảnh báo gian lận';

    protected static ?string $modelLabel = 'cảnh báo gian lận';

    protected static ?string $pluralModelLabel = 'Cảnh báo gian lận';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedShieldExclamation;

    public static function form(Schema $schema): Schema
    {
        return FraudAlertForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FraudAlertsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFraudAlerts::route('/'),
            'create' => CreateFraudAlert::route('/create'),
            'edit' => EditFraudAlert::route('/{record}/edit'),
        ];
    }
}
