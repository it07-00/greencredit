<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\AdminStatsOverview;
use App\Filament\Widgets\GreenImpactWidget;
use App\Filament\Widgets\RecentFraudAlerts;
use App\Filament\Widgets\TopGreenStores;
use App\Filament\Widgets\TopGreenUsers;
use App\Filament\Widgets\TransactionChart;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Green Credit Admin')
            ->colors([
                'primary' => Color::Emerald,
                'danger'  => Color::Rose,
                'warning' => Color::Amber,
                'info'    => Color::Sky,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([])
            ->widgets([
                AccountWidget::class,
                AdminStatsOverview::class,
                GreenImpactWidget::class,
                RecentFraudAlerts::class,
                TopGreenStores::class,
                TopGreenUsers::class,
                TransactionChart::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
