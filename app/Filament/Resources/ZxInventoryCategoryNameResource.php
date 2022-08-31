<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\ZxInventoryCategoryName;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ZxInventoryCategoryNameResource\Pages;
use App\Filament\Resources\ZxInventoryCategoryNameResource\RelationManagers;

class ZxInventoryCategoryNameResource extends Resource
{
    protected static ?string $model = ZxInventoryCategoryName::class;
    use Translatable;

    //TITLE
    protected static ?string $recordTitleAttribute = 'name';

    //SETTINGS
    //GLOBAL SEARCH
    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }
    /*public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'slug', 'author.name', 'category.name'];
    }*/
    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            __('Description') => $record->description,
        ];
    }
    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return ZxInventoryCategoryNameResource::getUrl('view', ['record' => $record]);
    }

    //LABEL
    public static function getModelLabel(): string
    {
        return __('Items Category Name');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Items Category Names');
    }

    //NAVIGATION
    protected static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label(__('Name'))->required()->autofocus()
                    ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                    ->maxLength(32),
                TextInput::make('description')->label(__('Description'))
                    ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                    ->maxLength(64),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->label(__('Name'))->sortable()->searchable(),
                TextColumn::make('description')->label(__('Description')),
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
            'index' => Pages\ListZxInventoryCategoryNames::route('/'),
            //'create' => Pages\CreateZxInventoryCategoryName::route('/create'),
            //'view' => Pages\ViewZxInventoryCategoryName::route('/{record}'),
            //'edit' => Pages\EditZxInventoryCategoryName::route('/{record}/edit'),
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
