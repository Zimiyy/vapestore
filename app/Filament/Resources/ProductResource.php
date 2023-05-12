<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        FileUpload::make('product_image')
                        ->image()
                        ->imageCropAspectRatio('1:1')
                        ->directory('product'),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('details')
                                    ->rules(['min:10', 'max:20'])
                                    ->required(),
                                TextInput::make('price')
                                    ->numeric()
                                    ->integer()
                                    ->rules(['gte:1'])
                                    ->required(),
                                TextInput::make('quantity')
                                    ->numeric()
                                    ->integer()
                                    ->rules(['gte:500'])
                                    ->required(),

                            ]),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Imagecolumn::make('product_image')
                ->label('')
                ->size(50)
                ->rounded(),
            TextColumn::make('name')
                ->searchable()
                ->sortable(),
            TextColumn::make('updated_at')
                ->date()
                ->sortable(),
            TextColumn::make('details')
                ->searchable()
                ->sortable(),
            TextColumn::make('price')
                ->searchable()
                ->sortable(),
            TextColumn::make('quantity')
                ->searchable()
                ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
