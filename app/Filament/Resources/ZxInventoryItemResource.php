<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ZxInventoryItem;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Symfony\Component\Console\Input\Input;
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
                Grid::make(3)
                    ->schema([
                        Grid::make()
                            ->schema([
                                Card::make()
                                    ->schema([
                                        TextInput::make('name')->label(__('Name'))->required()
                                            ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                                            ->maxLength(32)->columnSpan(1),
                                        TextInput::make('model_no')->label(__('Model Number'))
                                            ->columnSpan(1),
                                        RichEditor::make('description')->label(__('Description'))
                                            ->hint(__('Translatable'))->hintIcon('heroicon-s-translate')
                                            ->maxLength(64)->columnSpan(2),
                                    ])->columns(2),
                            ])->columnSpan(2),
                        Grid::make()
                            ->schema([
                                Card::make()
                                    ->schema([
                                        FileUpload::make('photo_url')->label(__('Photo')),
                                        FileUpload::make('photo_url')->label(__('Photo')),
                                        FileUpload::make('photo_url')->label(__('Photo')),
                                        FileUpload::make('photo_url')->label(__('Photo')),
                                        FileUpload::make('photo_url')->label(__('Photo')),
                                        FileUpload::make('photo_url')->label(__('Photo')),

                                        Toggle::make('enabled')->label(__('Enabled'))
                                            ->inline(false)->default(true),
                                    ]),
                            ])->columnSpan(1),
                    ]),




                Section::make('Heading')
                    ->description('Description')
                    ->schema([
                        // ...
                    ]),
                Placeholder::make('Label')
                    ->content('Content, displayed underneath the label'),


                TextInput::make('barcode')->label(__('Barcode')),
                Select::make('brand_id')->label(__('Brand')),
                Select::make('parent_id')->label(__('Parent'))
                    ->options(ZxInventoryItem::all()->pluck('name', 'id')),
                Radio::make('variant_or_part')->label(__('Parent Type'))
                    ->options([
                        0 => __('Variant'),
                        1 => __('Part'),
                    ]),


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
