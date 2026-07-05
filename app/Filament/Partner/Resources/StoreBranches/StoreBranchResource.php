<?php

namespace App\Filament\Partner\Resources\StoreBranches;

use App\Models\StoreBranch;
use App\Models\Store;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class StoreBranchResource extends Resource
{
    protected static ?string $model = StoreBranch::class;

    protected static ?string $navigationLabel = 'Quản lý Chi nhánh';

    protected static ?string $modelLabel = 'chi nhánh';

    protected static ?string $pluralModelLabel = 'Chi nhánh';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === 'store_owner';
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();

        if (!$user || $user->role !== 'store_owner') {
            return $query->whereRaw('1=0');
        }

        $store = Store::where('owner_id', $user->id)->first();
        return $store ? $query->where('store_id', $store->id) : $query->whereRaw('1=0');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Tên chi nhánh')
                    ->required(),
                TextInput::make('address')
                    ->label('Địa chỉ')
                    ->required(),
                TextInput::make('city')
                    ->label('Thành phố')
                    ->default('TP. Hồ Chí Minh')
                    ->required(),
                TextInput::make('district')
                    ->label('Quận/Huyện')
                    ->required(),
                TextInput::make('phone')
                    ->label('Số điện thoại')
                    ->tel(),
                TextInput::make('manager_name')
                    ->label('Người quản lý'),
                Toggle::make('is_active')
                    ->label('Đang hoạt động')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Tên chi nhánh')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Địa chỉ')
                    ->searchable(),
                TextColumn::make('manager_name')
                    ->label('Người quản lý')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Điện thoại'),
                IconColumn::make('is_active')
                    ->label('Hoạt động')
                    ->boolean()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageStoreBranches::route('/'),
        ];
    }
}
