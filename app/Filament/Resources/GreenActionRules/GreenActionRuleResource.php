<?php

namespace App\Filament\Resources\GreenActionRules;

use App\Filament\Resources\GreenActionRules\Pages\CreateGreenActionRule;
use App\Filament\Resources\GreenActionRules\Pages\EditGreenActionRule;
use App\Filament\Resources\GreenActionRules\Pages\ListGreenActionRules;
use App\Filament\Resources\GreenActionRules\Schemas\GreenActionRuleForm;
use App\Filament\Resources\GreenActionRules\Tables\GreenActionRulesTable;
use App\Models\GreenActionRule;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GreenActionRuleResource extends Resource
{
    protected static ?string $model = GreenActionRule::class;

    protected static ?string $navigationLabel = 'Quy tắc điểm xanh';

    protected static ?string $modelLabel = 'quy tắc điểm xanh';

    protected static ?string $pluralModelLabel = 'Quy tắc điểm xanh';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    public static function form(Schema $schema): Schema
    {
        return GreenActionRuleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GreenActionRulesTable::configure($table);
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
            'index' => ListGreenActionRules::route('/'),
            'create' => CreateGreenActionRule::route('/create'),
            'edit' => EditGreenActionRule::route('/{record}/edit'),
        ];
    }
}
