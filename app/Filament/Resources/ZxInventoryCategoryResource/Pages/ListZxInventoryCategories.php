<?php

namespace App\Filament\Resources\ZxInventoryCategoryResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZxInventoryCategories extends ListRecords
{
    protected static string $resource = ZxInventoryCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
