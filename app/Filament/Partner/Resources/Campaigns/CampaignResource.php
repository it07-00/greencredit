<?php

namespace App\Filament\Partner\Resources\Campaigns;

use App\Models\Campaign;
use App\Models\Partner;
use App\Models\Store;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CampaignResource extends Resource
{
    protected static ?string $model = Campaign::class;

    protected static ?string $navigationLabel = 'Quản lý Chiến dịch';

    protected static ?string $modelLabel = 'chiến dịch';

    protected static ?string $pluralModelLabel = 'Chiến dịch';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    public static function shouldRegisterNavigation(): bool
    {
        return in_array(auth()->user()?->role, ['partner', 'store_owner']);
    }

    public static function getEloquentQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $user = auth()->user();
        $query = parent::getEloquentQuery();

        if (!$user) {
            return $query->whereRaw('1=0');
        }

        if ($user->role === 'partner') {
            $partner = Partner::where('user_id', $user->id)->first();
            return $partner ? $query->where('partner_id', $partner->id) : $query->whereRaw('1=0');
        }

        if ($user->role === 'store_owner') {
            $store = Store::where('owner_id', $user->id)->first();
            return $store ? $query->where('store_id', $store->id) : $query->whereRaw('1=0');
        }

        return $query->whereRaw('1=0');
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Tiêu đề chiến dịch')
                    ->required(),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->columnSpanFull(),
                Select::make('type')
                    ->label('Loại chiến dịch')
                    ->options([
                        'voucher' => 'Đổi Voucher',
                        'event' => 'Sự kiện môi trường',
                        'donation' => 'Quyên góp xanh',
                        'other' => 'Khác',
                    ])
                    ->required()
                    ->default('voucher'),
                TextInput::make('budget')
                    ->label('Ngân sách (đ)')
                    ->numeric(),
                DateTimePicker::make('started_at')
                    ->label('Ngày bắt đầu'),
                DateTimePicker::make('ended_at')
                    ->label('Ngày kết thúc'),
                Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'draft' => 'Nháp',
                        'active' => 'Đang chạy',
                        'completed' => 'Đã kết thúc',
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
                TextColumn::make('type')
                    ->label('Loại')
                    ->searchable(),
                TextColumn::make('budget')
                    ->label('Ngân sách')
                    ->numeric()
                    ->suffix(' đ')
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
                        'active' => 'Đang chạy',
                        'draft' => 'Nháp',
                        default => 'Đã kết thúc',
                    }),
                TextColumn::make('started_at')
                    ->label('Bắt đầu')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('ended_at')
                    ->label('Kết thúc')
                    ->dateTime('d/m/Y')
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
            'index' => Pages\ManageCampaigns::route('/'),
        ];
    }
}
