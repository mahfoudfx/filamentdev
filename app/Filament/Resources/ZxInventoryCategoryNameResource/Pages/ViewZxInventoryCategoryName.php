<?php

namespace App\Filament\Resources\ZxInventoryCategoryNameResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryNameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewZxInventoryCategoryName extends ViewRecord
{
    protected static string $resource = ZxInventoryCategoryNameResource::class;
    use ViewRecord\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
