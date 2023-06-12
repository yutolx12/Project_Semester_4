<?php

namespace App\Filament\Resources\EnergyResource\Widgets;

// use App\Models\Post;

use App\Models\Energy;
// use Filament\Forms\Components\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    // protected static string $view = 'filament.resources.energy-resource.widgets.stats-overview';
    protected function getCards(): array
    {
        return [
            // Card::make('Ampere', Energy::where('ampere', 2)->latest())
            //     ->description('All Post')
            //     ->descriptionIcon('heroicon-s-trending-up'),
            // Card::make('Voltage', Energy::where('status', true)->count()),
            // Card::make('Watt', Energy::where('status', false)->count()),
        ];
    }
}
