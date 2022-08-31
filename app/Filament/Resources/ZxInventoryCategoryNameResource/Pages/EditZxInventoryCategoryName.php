<?php

namespace App\Filament\Resources\ZxInventoryCategoryNameResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryNameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZxInventoryCategoryName extends EditRecord
{
    protected static string $resource = ZxInventoryCategoryNameResource::class;
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
