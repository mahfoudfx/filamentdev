<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ZxInventorySku;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ZxInventorySkuResource\Pages;
use App\Filament\Resources\ZxInventorySkuResource\RelationManagers;

class ZxInventorySkuResource extends Resource
{
    protected static ?string $model = ZxInventorySku::class;

    //TITLE
    protected static ?string $recordTitleAttribute = 'name';

    //SETTINGS
    //GLOBAL SEARCH
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }
    public static function getGloballySearchableAttributes(): array
    {
        return ['serial_no'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            __('serial_no') => $record->Barcode,
        ];
    }
    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return ZxInventorySkuResource::getUrl('view', ['record' => $record]);
    }

    //LABEL
    public static function getModelLabel(): string
    {
        return __('SKU');
    }
    public static function getPluralModelLabel(): string
    {
        return __('SKUs');
    }

    //NAVIGATION
    protected static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }
    public static function getNavigationLabel(): string
    {
        return __('SKUs');
    }
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListZxInventorySkus::route('/'),
            'create' => Pages\CreateZxInventorySku::route('/create'),
            'view' => Pages\ViewZxInventorySku::route('/{record}'),
            'edit' => Pages\EditZxInventorySku::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
