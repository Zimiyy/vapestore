<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StorageSizeResource\Pages;
use App\Filament\Resources\StorageSizeResource\RelationManagers;
use App\Models\StorageSize;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StorageSizeResource extends Resource
{
    protected static ?string $model = StorageSize::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                    Grid::make(2)
                    ->schema([
                        TextInput::make('label')->required(),
                        TextInput::make('size')->label('Size in GB')->numeric()->required(),
                        Select::make('status')
                        ->options([
                            'active' => 'Active',
                            'inactive' => 'Inactive',
                        ])->required(),
                    ]),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('size')->label('Size (GB)')
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('status')
                    ->enum([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->colors([
                        'success' => 'active',
                        'danger' => 'inactive',
                    ])
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
            'index' => Pages\ListStorageSizes::route('/'),
            'create' => Pages\CreateStorageSize::route('/create'),
            'edit' => Pages\EditStorageSize::route('/{record}/edit'),
        ];
    }    
}
