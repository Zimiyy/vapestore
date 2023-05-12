<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['password'] = bcrypt($data['password']);

        return array_merge($data, [
            'user_id' => auth()->id(),
        ]);
    }

    protected function getCreatedNotificationMessage(): ?string
    {
        return 'User is successfully created';
    }
}
