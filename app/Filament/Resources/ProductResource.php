<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\StorageSize;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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

    protected static ?string $navigationIcon = 'heroicon-o-archive';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                FileUpload::make('product_image')->label('Main Image')
                                    ->image()
                                    ->imageCropAspectRatio('1:1')
                                    ->directory('product')
                                    ->required(),
                                FileUpload::make('extra_image')
                                    ->image()
                                    ->imageCropAspectRatio('1:1')
                                    ->directory('product')
                                    ->multiple()
                                    ->maxFiles(5),
                                TextInput::make('name')
                                    ->required(),
                                Select::make('color')
                                    ->label('Color')
                                    ->options(Color::where('status', 'active')->orderBy('name')->get()->pluck('name', 'id'))
                                    ->multiple()
                                    ->searchable(),
                                Select::make('storage_size')
                                    ->label('Storage Size')
                                    ->options(StorageSize::where('status', 'active')->orderBy('size')->get()->pluck('label', 'id'))
                                    ->multiple()
                                    ->searchable(),
                                Select::make('category')
                                    ->options(Category::where('status', 'active')->orderBy('name')->get()->pluck('name', 'id'))
                                    ->searchable(),
                                TextInput::make('price')
                                    ->integer()
                                    ->mask(fn (TextInput\Mask $mask) => $mask->money(prefix: 'RM', thousandsSeparator: ',', decimalPlaces: 2))
                                    ->afterStateUpdated(function (Closure $set, $state, $get) {
                                        $final_class = $state - ($get('discount')/100*$state);
                                        $set('discount_price', $final_class);
                                    })
                                    ->required(),
                                TextInput::make('quantity')->label('Stock')
                                    ->numeric()
                                    ->integer()
                                    ->rules(['gte:1'])
                                    ->required(),
                            ]),
                            Toggle::make('discount_tag')->label('Has Discount?')->reactive(),
                            Grid::make(2)
                            ->schema([
                                TextInput::make('discount')->label('Discount (%)')
                                    ->integer()
                                    ->maxValue(100)
                                    ->reactive()
                                    ->afterStateUpdated(function (Closure $set, $state, $get) {
                                        $final_class = $get('price') - ($state/100*$get('price'));
                                        $set('discount_price', $final_class);
                                    })
                                    ->hidden(function (callable $get) {
                                        if ($get('discount_tag') == true) {
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    }),
                                TextInput::make('discount_price')
                                    ->integer()
                                    ->disabled()
                                    ->hidden(function (callable $get) {
                                        if ($get('discount_tag') == true) {
                                            return false;
                                        } else {
                                            return true;
                                        }
                                    }),
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
            TextColumn::make('discount')->label('Discount (%)')
                ->searchable()
                ->sortable(),
            TextColumn::make('price')->label('Price (RM)')
                ->searchable()
                ->sortable(),
            TextColumn::make('discount_price')->label('Price after Discount (RM)')
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
