<?php

namespace App\Filament\Resources\ZxInventoryCategoryResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewZxInventoryCategory extends ViewRecord
{
    protected static string $resource = ZxInventoryCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
