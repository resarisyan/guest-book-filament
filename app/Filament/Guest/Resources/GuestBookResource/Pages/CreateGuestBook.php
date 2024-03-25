<?php

namespace App\Filament\Guest\Resources\GuestBookResource\Pages;

use App\Filament\Guest\Resources\GuestBookResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateGuestBook extends CreateRecord
{
    protected static string $resource = GuestBookResource::class;

    protected function getRedirectUrl(): string
    {
        return route('welcome');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Guest Book Created')
            ->body('The guest book has been created successfully.');
    }
}
