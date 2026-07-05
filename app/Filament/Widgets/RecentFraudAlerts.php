<?php

namespace App\Filament\Widgets;

use App\Models\FraudAlert;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class RecentFraudAlerts extends TableWidget
{
    protected static ?string $heading = 'Cảnh báo gian lận mới nhất';

    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => FraudAlert::query()->with(['user', 'store'])->latest()->limit(10))
            ->columns([
                TextColumn::make('alert_type')->label('Loại cảnh báo')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'duplicate_scan'          => 'warning',
                        'invalid_qr'              => 'danger',
                        'expired_invoice_attempt' => 'warning',
                        'too_many_scans_per_day'  => 'danger',
                        'suspicious_pattern'      => 'danger',
                        default                   => 'gray',
                    }),
                TextColumn::make('user.name')->label('Người dùng')->default('Không xác định'),
                TextColumn::make('store.name')->label('Cửa hàng')->default('Không xác định'),
                TextColumn::make('risk_score')->label('Điểm rủi ro')->badge()
                    ->color(fn (int $state): string => $state >= 70 ? 'danger' : ($state >= 50 ? 'warning' : 'success')),
                TextColumn::make('status')->label('Trạng thái')->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'open'      => 'danger',
                        'reviewing' => 'warning',
                        'resolved'  => 'success',
                        default     => 'gray',
                    }),
                TextColumn::make('created_at')->label('Thời gian')->since()->sortable(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
