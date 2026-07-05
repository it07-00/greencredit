<?php

namespace App\Filament\Partner\Resources\StoreStaffs;

use App\Models\StoreStaff;
use App\Models\Store;
use App\Models\StoreBranch;
use App\Models\User;
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
use Illuminate\Support\Facades\Hash;

class StoreStaffResource extends Resource
{
    protected static ?string $model = StoreStaff::class;

    protected static ?string $navigationLabel = 'Nhân sự Cửa hàng';

    protected static ?string $modelLabel = 'nhân sự';

    protected static ?string $pluralModelLabel = 'Nhân sự';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedUsers;

    protected static ?string $slug = 'store-staff';

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
        $user = auth()->user();
        $store = $user ? Store::where('owner_id', $user->id)->first() : null;
        $branches = $store ? StoreBranch::where('store_id', $store->id)->pluck('name', 'id')->toArray() : [];

        return $schema
            ->components([
                TextInput::make('staff_name')
                    ->label('Họ và tên')
                    ->required()
                    ->placeholder('Nhập tên nhân viên')
                    ->afterStateHydrated(function ($component, $state, $record) {
                        if ($record && $record->user) {
                            $component->state($record->user->name);
                        }
                    })
                    ->dehydrated(true),

                TextInput::make('staff_email')
                    ->label('Email đăng nhập')
                    ->required()
                    ->email()
                    ->placeholder('staff@gmail.com')
                    ->afterStateHydrated(function ($component, $state, $record) {
                        if ($record && $record->user) {
                            $component->state($record->user->email);
                        }
                    })
                    ->dehydrated(true),

                TextInput::make('staff_password')
                    ->label('Mật khẩu')
                    ->password()
                    ->placeholder('Mật khẩu đăng nhập')
                    ->dehydrated(false),

                Select::make('branch_id')
                    ->label('Chi nhánh làm việc')
                    ->options($branches)
                    ->required(),

                TextInput::make('position')
                    ->label('Chức vụ')
                    ->default('Nhân viên thu ngân')
                    ->required(),

                Toggle::make('is_active')
                    ->label('Đang hoạt động')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Họ tên')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('branch.name')
                    ->label('Chi nhánh')
                    ->searchable(),
                TextColumn::make('position')
                    ->label('Chức danh')
                    ->searchable(),
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
                EditAction::make()
                    ->mutateFormDataUsing(function (array $data, $record): array {
                        if ($record->user) {
                            $record->user->update([
                                'name' => $data['staff_name'] ?? $record->user->name,
                                'email' => $data['staff_email'] ?? $record->user->email,
                            ]);
                            if (!empty($data['staff_password'])) {
                                $record->user->update([
                                    'password' => Hash::make($data['staff_password']),
                                ]);
                            }
                        }
                        unset($data['staff_name']);
                        unset($data['staff_email']);
                        unset($data['staff_password']);
                        return $data;
                    }),
                DeleteAction::make()
                    ->after(function ($record) {
                        if ($record->user) {
                            $record->user->delete();
                        }
                    }),
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
            'index' => Pages\ManageStoreStaffs::route('/'),
        ];
    }
}
