<?php

namespace App\Filament\Resources\ZxInventoryItemResource\Pages;

use App\Filament\Resources\ZxInventoryItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZxInventoryItem extends EditRecord
{
    protected static string $resource = ZxInventoryItemResource::class;
    use EditRecord\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
