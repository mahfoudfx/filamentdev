<?php

namespace App\Filament\Resources\ZxInventoryItemResource\Pages;

use App\Filament\Resources\ZxInventoryItemResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZxInventoryItems extends ListRecords
{
    protected static string $resource = ZxInventoryItemResource::class;
    //use ListRecords\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
