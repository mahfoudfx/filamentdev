<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ZxInventoryItem;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ZxInventoryItemResource\Pages;
use App\Filament\Resources\ZxInventoryItemResource\RelationManagers;

class ZxInventoryItemResource extends Resource
{
    protected static ?string $model = ZxInventoryItem::class;
    use Translatable;

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
        return ['name', 'model_no', 'barcode'];
    }
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            __('Description') => $record->description,
            __('Model Number') => $record->model_no,
            __('Barcode') => $record->Barcode,
        ];
    }
    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return ZxInventoryItemResource::getUrl('view', ['record' => $record]);
    }

    //LABEL
    public static function getModelLabel(): string
    {
        return __('Item');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Items');
    }

    //NAVIGATION
    protected static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 3;

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
            'index' => Pages\ListZxInventoryItems::route('/'),
            'create' => Pages\CreateZxInventoryItem::route('/create'),
            'view' => Pages\ViewZxInventoryItem::route('/{record}'),
            'edit' => Pages\EditZxInventoryItem::route('/{record}/edit'),
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
