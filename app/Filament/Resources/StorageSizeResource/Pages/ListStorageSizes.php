<?php

namespace App\Filament\Resources\StorageSizeResource\Pages;

use App\Filament\Resources\StorageSizeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStorageSizes extends ListRecords
{
    protected static string $resource = StorageSizeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
