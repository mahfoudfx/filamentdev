<?php

namespace App\Filament\Resources\ZxInventorySkuResource\Pages;

use App\Filament\Resources\ZxInventorySkuResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZxInventorySkus extends ListRecords
{
    protected static string $resource = ZxInventorySkuResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
