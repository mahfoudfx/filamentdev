<?php

namespace App\Filament\Resources\ZxInventoryCategoryNameResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryNameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateZxInventoryCategoryName extends CreateRecord
{
    protected static string $resource = ZxInventoryCategoryNameResource::class;
    use CreateRecord\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
