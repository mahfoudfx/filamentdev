<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use App\Models\ZxInventoryCategory;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Models\ZxInventoryCategoryName;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ZxInventoryCategoryResource\Pages;
use App\Filament\Resources\ZxInventoryCategoryResource\RelationManagers;

class ZxInventoryCategoryResource extends Resource
{
    protected static ?string $model = ZxInventoryCategory::class;
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
        return ZxInventoryCategoryResource::getUrl('view', ['record' => $record]);
    }

    //LABEL
    public static function getModelLabel(): string
    {
        return __('Items Category');
    }
    public static function getPluralModelLabel(): string
    {
        return __('Items Categories');
    }

    //NAVIGATION
    protected static function getNavigationGroup(): ?string
    {
        return __('Inventory');
    }
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_name_id')->label(__('Name'))->required() //->searchable()
                    //->options(ZxInventoryCategoryName::all()->pluck('name', 'id'))
                    ->relationship('categoryName', 'name')
                    //->getOptionLabelFromRecordUsing(fn (Model $record) => "{$record->name}")
                    //->getSearchResultsUsing(fn (string $search) => ZxInventoryCategoryName::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id'))
                    //->getOptionLabelUsing(fn ($value): ?string => ZxInventoryCategoryName::find($value)?->name)
                    ->createOptionForm([
                        TextInput::make('name')->label(__('Name'))->required()
                            ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                            ->maxLength(32),
                        TextInput::make('description')->label(__('Description'))
                            ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                            ->maxLength(64),
                    ]),
                TextInput::make('description')->label(__('Description'))
                    ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                    ->maxLength(64),
                Select::make('parent_id')->label(__('Parent'))->searchable()
                    ->relationship('parent', 'name'),
                    //->getSearchResultsUsing(fn (string $search) => User::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id'))
                    //->getOptionLabelUsing(fn ($value): ?string => User::find($value)?->name),
                //->options(ZxInventoryCategory::all()->pluck('name', 'id')),
                Select::make('icon_id')->label(__('Icon'))->searchable()
                    ->relationship('icon', 'name'),
                Toggle::make('enabled')->label(__('Enabled'))->inline(false)->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('parent.name')->label(__('Parent'))->sortable()->searchable(),
                TextColumn::make('name')->label(__('Name'))->sortable()->searchable(),
                TextColumn::make('description')->label(__('Description')),
                BooleanColumn::make('enabled')->label(__('Enabled')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListZxInventoryCategories::route('/'),
            'create' => Pages\CreateZxInventoryCategory::route('/create'),
            'view' => Pages\ViewZxInventoryCategory::route('/{record}'),
            'edit' => Pages\EditZxInventoryCategory::route('/{record}/edit'),
        ];
    }
}
