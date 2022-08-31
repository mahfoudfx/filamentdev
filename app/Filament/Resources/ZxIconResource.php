<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\ZxIcon;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\ZxIconResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ZxIconResource\RelationManagers;

class ZxIconResource extends Resource
{
    protected static ?string $model = ZxIcon::class;
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
    /*public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Author' => $record->author->name,
            'Category' => $record->category->name,
        ];
    }*/
    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return ZxIconResource::getUrl('view', ['record' => $record]);
    }

    //LABEL
    public static function getModelLabel(): string
    {
        return __('Icon');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Icons');
    }

    //NAVIGATION
    protected static function getNavigationGroup(): ?string
    {
        return __('Settings');
    }
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 1;

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
            'index' => Pages\ListZxIcons::route('/'),
            'create' => Pages\CreateZxIcon::route('/create'),
            'view' => Pages\ViewZxIcon::route('/{record}'),
            'edit' => Pages\EditZxIcon::route('/{record}/edit'),
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
