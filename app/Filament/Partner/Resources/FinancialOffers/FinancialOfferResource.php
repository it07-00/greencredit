<?php

namespace App\Filament\Partner\Resources\FinancialOffers;

use App\Models\FinancialOffer;
use App\Models\Partner;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FinancialOfferResource extends Resource
{
    protected static ?string $model = FinancialOffer::class;

    protected static ?string $navigationLabel = 'Gói Tài chính Xanh';

    protected static ?string $modelLabel = 'gói tài chính';

    protected static ?string $pluralModelLabel = 'Gói Tài chính Xanh';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()?->role === 'partner';
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();

        if (!$user || $user->role !== 'partner') {
            return $query->whereRaw('1=0');
        }

        $partner = Partner::where('user_id', $user->id)->first();
        return $partner ? $query->where('partner_id', $partner->id) : $query->whereRaw('1=0');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Tên gói tài chính')
                    ->required(),
                Textarea::make('description')
                    ->label('Mô tả chi tiết')
                    ->columnSpanFull(),
                TextInput::make('min_green_score')
                    ->label('Green Score tối thiểu')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('base_interest_rate')
                    ->label('Lãi suất cơ bản (%)')
                    ->numeric()
                    ->placeholder('Ví dụ: 8.5'),
                TextInput::make('discounted_interest_rate')
                    ->label('Lãi suất ưu đãi (%)')
                    ->numeric()
                    ->placeholder('Ví dụ: 6.5'),
                TextInput::make('max_amount')
                    ->label('Hạn mức tối đa (đ)')
                    ->numeric(),
                TextInput::make('required_points')
                    ->label('Điểm đổi ưu đãi')
                    ->required()
                    ->numeric()
                    ->default(0),
                Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'draft' => 'Nháp',
                        'active' => 'Hoạt động',
                        'inactive' => 'Tạm khóa',
                    ])
                    ->required()
                    ->default('draft'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Tiêu đề')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('min_green_score')
                    ->label('Green Score yêu cầu')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('base_interest_rate')
                    ->label('Lãi suất gốc')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('discounted_interest_rate')
                    ->label('Lãi suất ưu đãi')
                    ->suffix('%')
                    ->sortable(),
                TextColumn::make('max_amount')
                    ->label('Hạn mức vay')
                    ->numeric()
                    ->suffix(' đ')
                    ->sortable(),
                TextColumn::make('required_points')
                    ->label('Điểm quy đổi')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Trạng thái')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'draft' => 'warning',
                        default => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Hoạt động',
                        'draft' => 'Nháp',
                        default => 'Tạm khóa',
                    }),
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
            'index' => Pages\ManageFinancialOffers::route('/'),
        ];
    }
}
