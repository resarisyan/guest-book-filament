<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use App\Models\Guest;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\DB;

class CreateGuest extends CreateRecord
{
    protected static string $resource = GuestResource::class;

    protected function handleRecordCreation(array $data): Guest
    {
        try {
            DB::beginTransaction();
            $geust =  static::getModel()::create($data);
            $categories = [];
            foreach ($data['categories'] as $category) {
                $categories[] = [
                    'id' => Str::uuid(),
                    'guest_id' => $geust->id,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('guest_categories')->insert($categories);
            DB::commit();
            return $geust;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Guest Created')
            ->body('The guest has been created successfully.');
    }
}
