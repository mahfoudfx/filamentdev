<?php

namespace App\Filament\Resources\ZxIconResource\Pages;

use App\Filament\Resources\ZxIconResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZxIcons extends ListRecords
{
    protected static string $resource = ZxIconResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
