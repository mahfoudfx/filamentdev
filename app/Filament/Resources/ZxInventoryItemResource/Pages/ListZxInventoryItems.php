<?php

namespace App\Filament\Resources\ZxInventoryItemResource\Pages;

use App\Filament\Resources\ZxInventoryItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZxInventoryItems extends ListRecords
{
    protected static string $resource = ZxInventoryItemResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
