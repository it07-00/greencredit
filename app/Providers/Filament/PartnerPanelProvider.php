<?php

namespace App\Providers\Filament;

use App\Filament\Partner\Pages\PartnerDashboard;
use App\Http\Middleware\RequireBusinessRole;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class PartnerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('partner')
            ->path('partner')
            ->login()
            ->brandName('Green Credit Business')
            ->colors([
                'primary' => Color::Emerald,
            ])
            ->pages([
                PartnerDashboard::class,
                \App\Filament\Partner\Pages\POSPage::class,
            ])
            ->discoverResources(
                in: app_path('Filament/Partner/Resources'),
                for: 'App\\Filament\\Partner\\Resources'
            )
            ->discoverWidgets(
                in: app_path('Filament/Partner/Widgets'),
                for: 'App\\Filament\\Partner\\Widgets'
            )
            ->widgets([])
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
                RequireBusinessRole::class, // Chỉ cho store_owner, store_staff, partner
            ]);
    }
}
