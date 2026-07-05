<?php

namespace App\Filament\Partner\Resources\Vouchers;

use App\Models\Voucher;
use App\Models\Partner;
use App\Models\Store;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VoucherResource extends Resource
{
    protected static ?string $model = Voucher::class;

    protected static ?string $navigationLabel = 'Quản lý Voucher';

    protected static ?string $modelLabel = 'voucher';

    protected static ?string $pluralModelLabel = 'Vouchers';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

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
                    ->label('Tiêu đề')
                    ->required(),
                TextInput::make('code')
                    ->label('Mã Voucher')
                    ->required()
                    ->unique(ignoringRecord: true),
                Textarea::make('description')
                    ->label('Mô tả')
                    ->columnSpanFull(),
                Select::make('category')
                    ->label('Danh mục')
                    ->options([
                        'cafe' => 'Cà phê & Đồ uống',
                        'milk_tea' => 'Trà sữa',
                        'restaurant' => 'Nhà hàng',
                        'supermarket' => 'Siêu thị',
                        'convenience_store' => 'Cửa hàng tiện lợi',
                        'other' => 'Khác',
                    ])
                    ->required()
                    ->default('other'),
                TextInput::make('required_points')
                    ->label('Điểm yêu cầu')
                    ->required()
                    ->numeric(),
                Select::make('discount_type')
                    ->label('Loại giảm giá')
                    ->options([
                        'fixed' => 'Cố định (đ)',
                        'percent' => 'Phần trăm (%)',
                    ])
                    ->required()
                    ->default('fixed'),
                TextInput::make('discount_value')
                    ->label('Giá trị giảm')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('quantity')
                    ->label('Số lượng phát hành')
                    ->numeric()
                    ->placeholder('Để trống nếu không giới hạn'),
                TextInput::make('min_green_score')
                    ->label('Green Score tối thiểu')
                    ->required()
                    ->numeric()
                    ->default(0),
                DateTimePicker::make('started_at')
                    ->label('Ngày bắt đầu'),
                DateTimePicker::make('expired_at')
                    ->label('Ngày hết hạn'),
                Select::make('status')
                    ->label('Trạng thái')
                    ->options([
                        'draft' => 'Nháp',
                        'active' => 'Hoạt động',
                        'inactive' => 'Tạm ngưng',
                    ])
                    ->required()
                    ->default('draft'),
                Textarea::make('terms')
                    ->label('Điều khoản áp dụng')
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->label('Hình ảnh')
                    ->image(),
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
                TextColumn::make('code')
                    ->label('Mã')
                    ->searchable(),
                TextColumn::make('category')
                    ->label('Danh mục')
                    ->searchable(),
                TextColumn::make('required_points')
                    ->label('Điểm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('discount_value')
                    ->label('Giá trị giảm')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('quantity')
                    ->label('Tổng số')
                    ->placeholder('Không giới hạn'),
                TextColumn::make('used_quantity')
                    ->label('Đã dùng')
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
                        default => 'Tạm ngưng',
                    }),
                TextColumn::make('expired_at')
                    ->label('Ngày hết hạn')
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
            'index' => Pages\ManageVouchers::route('/'),
        ];
    }
}
