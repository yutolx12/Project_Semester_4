<?php

namespace App\Filament\Resources\LendingResource\Pages;

use App\Filament\Resources\LendingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLending extends CreateRecord
{
    protected static string $resource = LendingResource::class;
}
