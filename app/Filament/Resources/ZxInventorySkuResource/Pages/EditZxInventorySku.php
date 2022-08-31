<?php

namespace App\Filament\Resources\ZxInventorySkuResource\Pages;

use App\Filament\Resources\ZxInventorySkuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZxInventorySku extends EditRecord
{
    protected static string $resource = ZxInventorySkuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
