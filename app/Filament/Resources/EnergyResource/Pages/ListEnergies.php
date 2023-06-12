<?php

namespace App\Filament\Resources\EnergyResource\Pages;

use App\Filament\Resources\EnergyResource;
use App\Filament\Resources\EnergyResource\Widgets\StatsOverview;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEnergies extends ListRecords
{
    protected static string $resource = EnergyResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class
        ];
    }
}
