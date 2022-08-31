<?php

namespace App\Filament\Resources\ZxInventoryCategoryResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZxInventoryCategory extends EditRecord
{
    protected static string $resource = ZxInventoryCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
