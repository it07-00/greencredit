<?php

namespace App\Filament\Resources\GreenTransactions;

use App\Filament\Resources\GreenTransactions\Pages\ListGreenTransactions;
use App\Filament\Resources\GreenTransactions\Schemas\GreenTransactionForm;
use App\Filament\Resources\GreenTransactions\Tables\GreenTransactionsTable;
use App\Models\GreenTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GreenTransactionResource extends Resource
{
    protected static ?string $model = GreenTransaction::class;

    protected static ?string $navigationLabel = 'Giao dịch xanh';

    protected static ?string $modelLabel = 'giao dịch xanh';

    protected static ?string $pluralModelLabel = 'Giao dịch xanh';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowsRightLeft;

    public static function form(Schema $schema): Schema
    {
        return GreenTransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GreenTransactionsTable::configure($table);
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
            'index' => ListGreenTransactions::route('/'),
        ];
    }
}
