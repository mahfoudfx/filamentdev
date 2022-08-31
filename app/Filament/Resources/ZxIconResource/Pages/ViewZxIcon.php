<?php

namespace App\Filament\Resources\ZxIconResource\Pages;

use App\Filament\Resources\ZxIconResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewZxIcon extends ViewRecord
{
    protected static string $resource = ZxIconResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
