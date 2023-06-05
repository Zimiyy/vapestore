<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\components\Card;
use Filament\Forms\components\Grid;
use Filament\Forms\components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\columns\ImageColumn;
use Filament\Tables\columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Component;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        FileUpload::make('profile')
                        ->image()
                        ->imageCropAspectRatio('1:1')
                        ->directory('users'),
                        Grid::make(1)
                            ->schema([
                                TextInput::make('name')
                                    ->required(),
                                TextInput::make('email')
                                    ->email()
                                    ->unique(ignoreRecord: true)
                                    ->required(),
                                Select::make('role')
                                ->options([
                                    'admin' => 'Admin',
                                    'customer' => 'Customer',
                                ])->required(),
                                TextInput::make('password')
                                    ->password()
                                    ->confirmed()
                                    ->required(fn(Component $livewire): bool => $livewire instanceof Pages\CreateUser),
                                TextInput::make('password_confirmation')
                                    ->label('Re-type Password')
                                    ->password()
                                    ->required(fn(Component $livewire): bool => $livewire instanceof Pages\CreateUser),


                            ]),
                        ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Imagecolumn::make('profile')
                    ->label('')
                    ->size(50)
                    ->rounded(),
                TextColumn::make('name')
                    ->description(fn (User $record): string => $record->email)
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('role')
                    ->enum([
                        'admin' => 'Admin',
                        'customer' => 'Customer',
                    ])
                    ->colors([
                        'warning' => 'admin',
                        'success' => 'customer',
                    ]),
                TextColumn::make('updated_at')
                    ->date()
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
