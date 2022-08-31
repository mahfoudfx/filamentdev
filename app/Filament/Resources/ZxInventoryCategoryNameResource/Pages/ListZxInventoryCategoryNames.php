<?php

namespace App\Filament\Resources\ZxInventoryCategoryNameResource\Pages;

use App\Filament\Resources\ZxInventoryCategoryNameResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListZxInventoryCategoryNames extends ListRecords
{
    protected static string $resource = ZxInventoryCategoryNameResource::class;
    //use ListRecords\Concerns\Translatable;

    protected function getActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
