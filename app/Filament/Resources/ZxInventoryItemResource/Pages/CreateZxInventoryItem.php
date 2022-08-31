<?php

namespace App\Filament\Resources\ZxInventoryItemResource\Pages;

use App\Filament\Resources\ZxInventoryItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateZxInventoryItem extends CreateRecord
{
    protected static string $resource = ZxInventoryItemResource::class;
    use CreateRecord\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
