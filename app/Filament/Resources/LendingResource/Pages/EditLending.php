<?php

namespace App\Filament\Resources\LendingResource\Pages;

use App\Filament\Resources\LendingResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLending extends EditRecord
{
    protected static string $resource = LendingResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
