<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Navigation\NavigationItem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Filament::serving(function () {
        //     Filament::registerNavigationItems([
        //         NavigationItem::make('Analytics')
        //             ->url(route('landing'))
        //             ->icon('heroicon-o-presentation-chart-line')
        //             ->activeIcon('heroicon-s-presentation-chart-line')
        //             ->sort(1),
        //     ]);
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
