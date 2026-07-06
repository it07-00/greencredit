<?php

namespace App\Filament\Resources\ActivityLogs;

use App\Filament\Resources\ActivityLogs\Pages\ListActivityLogs;
use App\Filament\Resources\ActivityLogs\Schemas\ActivityLogForm;
use App\Filament\Resources\ActivityLogs\Tables\ActivityLogsTable;
use App\Models\ActivityLog;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ActivityLogResource extends Resource
{
    protected static ?string $model = ActivityLog::class;

    protected static ?string $navigationLabel = 'Nhật ký hoạt động';

    protected static ?string $modelLabel = 'nhật ký';

    protected static ?string $pluralModelLabel = 'Nhật ký hoạt động';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static string|\UnitEnum|null $navigationGroup = 'Giám sát hệ thống';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return ActivityLogForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ActivityLogsTable::configure($table);
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
            'index' => ListActivityLogs::route('/'),
        ];
    }
}
