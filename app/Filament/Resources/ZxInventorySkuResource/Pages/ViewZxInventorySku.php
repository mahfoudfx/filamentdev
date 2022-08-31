<?php

namespace App\Filament\Resources\ZxInventorySkuResource\Pages;

use App\Filament\Resources\ZxInventorySkuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewZxInventorySku extends ViewRecord
{
    protected static string $resource = ZxInventorySkuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
