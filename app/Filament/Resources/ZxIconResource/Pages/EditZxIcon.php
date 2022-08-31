<?php

namespace App\Filament\Resources\ZxIconResource\Pages;

use App\Filament\Resources\ZxIconResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditZxIcon extends EditRecord
{
    protected static string $resource = ZxIconResource::class;

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
