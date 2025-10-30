<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationItem;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('BankPro System')
            ->brandLogo(asset('images/bank-logo.png'))
            ->darkMode(true)
            ->sidebarCollapsibleOnDesktop(true)
            ->colors([
                'primary' => Color::Indigo,
                'secondary' => Color::Slate,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {
                return $builder->groups([
                    NavigationGroup::make('🏦 Banking')
                        ->items([
                            NavigationItem::make('Dashboard')
                                ->icon('heroicon-o-home')
                                ->url(route('filament.admin.pages.dashboard')),

                            NavigationItem::make('Customers')
                                ->icon('heroicon-o-users')
                                ->url(route('filament.admin.resources.customers.index')),

                            NavigationItem::make('Accounts')
                                ->icon('heroicon-o-credit-card')
                                ->url(route('filament.admin.resources.accounts.index')),

                            NavigationItem::make('Transactions')
                                ->icon('heroicon-o-arrow-path')
                                ->url(route('filament.admin.resources.transactions.index')),

                            NavigationItem::make('Deposits')
                                ->icon('heroicon-o-banknotes')
                                ->url(route('filament.admin.resources.deposits.index')),

                            NavigationItem::make('Withdrawals')
                                ->icon('heroicon-o-arrow-down-tray')
                                ->url(route('filament.admin.resources.withdrawals.index')),
                        ]),

                    NavigationGroup::make('⚙️ Settings')
                        ->items([
                            NavigationItem::make('User Roles')
                                ->icon('heroicon-o-shield-check')
                                ->url('#'),

                            NavigationItem::make('System Logs')
                                ->icon('heroicon-o-document-text')
                                ->url('#'),
                        ]),
                ]);
            })
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

