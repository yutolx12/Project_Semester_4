<?php

namespace App\Filament\Resources\EnergyResource\Pages;

use App\Filament\Resources\EnergyResource;
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
}
