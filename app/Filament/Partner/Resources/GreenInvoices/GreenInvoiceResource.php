<?php

namespace App\Filament\Partner\Resources\GreenInvoices;

use App\Filament\Partner\Resources\GreenInvoices\Pages\ManageGreenInvoices;
use App\Models\GreenInvoice;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GreenInvoiceResource extends Resource
{
    protected static ?string $model = GreenInvoice::class;

    protected static ?string $navigationLabel = 'Hóa đơn xanh';

    protected static ?string $modelLabel = 'hóa đơn xanh';

    protected static ?string $pluralModelLabel = 'Hóa đơn xanh';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'invoice_code';

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(auth()->user()?->role, ['store_owner', 'store_staff']);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();

        if (!$user) {
            return $query->whereRaw('1=0');
        }

        if ($user->role === 'store_owner') {
            $store = \App\Models\Store::where('owner_id', $user->id)->first();
            return $store ? $query->where('store_id', $store->id) : $query->whereRaw('1=0');
        }

        if ($user->role === 'store_staff') {
            $storeStaff = \App\Models\StoreStaff::where('user_id', $user->id)->first();
            return $storeStaff ? $query->where('store_id', $storeStaff->store_id) : $query->whereRaw('1=0');
        }

        return $query->whereRaw('1=0');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('store_id')
                    ->relationship('store', 'name')
                    ->required(),
                Select::make('branch_id')
                    ->relationship('branch', 'name'),
                Select::make('staff_id')
                    ->relationship('staff', 'name'),
                TextInput::make('invoice_code')
                    ->required(),
                TextInput::make('amount')
                    ->required()
                    ->numeric(),
                TextInput::make('payment_method'),
                Textarea::make('customer_note')
                    ->columnSpanFull(),
                Textarea::make('eco_actions')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('base_points')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('plastic_saved_grams')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('co2_saved_kg')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status')
                    ->required()
                    ->default('pending'),
                DateTimePicker::make('expired_at'),
                DateTimePicker::make('used_at'),
                TextInput::make('used_by')
                    ->numeric(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('store.name')
                    ->label('Store'),
                TextEntry::make('branch.name')
                    ->label('Branch')
                    ->placeholder('-'),
                TextEntry::make('staff.name')
                    ->label('Staff')
                    ->placeholder('-'),
                TextEntry::make('invoice_code'),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('payment_method')
                    ->placeholder('-'),
                TextEntry::make('customer_note')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('eco_actions')
                    ->columnSpanFull(),
                TextEntry::make('base_points')
                    ->numeric(),
                TextEntry::make('plastic_saved_grams')
                    ->numeric(),
                TextEntry::make('co2_saved_kg')
                    ->numeric(),
                TextEntry::make('status'),
                TextEntry::make('expired_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('used_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('used_by')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('invoice_code')
            ->columns([
                TextColumn::make('invoice_code')
                    ->label('Mã hóa đơn')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('branch.name')
                    ->label('Chi nhánh')
                    ->searchable(),
                TextColumn::make('staff.name')
                    ->label('Nhân viên')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('amount')
                    ->label('Tổng tiền')
                    ->numeric()
                    ->suffix(' đ')
                    ->sortable(),
                TextColumn::make('base_points')
                    ->label('Điểm thưởng')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('plastic_saved_grams')
                    ->label('Nhựa đã giảm')
                    ->numeric()
                    ->suffix('g')
                    ->sortable(),
                TextColumn::make('co2_saved_kg')
                    ->label('CO2 giảm thiểu')
                    ->numeric(3)
                    ->suffix(' kg')
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'used' => 'success',
                        'expired' => 'danger',
                        default => 'warning',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'used' => 'Đã quét',
                        'expired' => 'Hết hạn',
                        default => 'Chưa quét',
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Thời gian tạo')
                    ->dateTime('H:i d/m/Y')
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
            'index' => ManageGreenInvoices::route('/'),
        ];
    }
}
