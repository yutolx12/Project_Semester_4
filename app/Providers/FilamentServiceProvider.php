<?php

namespace App\Providers;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
            Filament::serving(function () {
                Filament::registerViteTheme('resources/css/filament.css');
                if(Auth::check() && Auth::user()->hasRole('adminsuper')){
                    Filament::registerUserMenuItems([
                        UserMenuItem::make()
                            ->label('Settings')
                            ->url(UserResource::getUrl())
                            ->icon('heroicon-s-cog'),
                        // ...
                    ]);
                }
                
            });
        
        
    }
}
