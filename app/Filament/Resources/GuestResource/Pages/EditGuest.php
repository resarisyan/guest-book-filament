<?php

namespace App\Filament\Resources\GuestResource\Pages;

use App\Filament\Resources\GuestResource;
use App\Models\Guest;
use Filament\Notifications\Notification;
use Illuminate\Support\Str;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EditGuest extends EditRecord
{
    protected static string $resource = GuestResource::class;
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        try {
            DB::beginTransaction();
            $record->update($data);
            DB::table('guest_categories')->where('guest_id', $record->id)->delete();
            $categories = [];
            foreach ($data['categories'] as $category) {
                $categories[] = [
                    'id' => Str::uuid(),
                    'guest_id' => $record->id,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            DB::table('guest_categories')->insert($categories);
            DB::commit();
            return $record;
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
            ->title('Guest Updated')
            ->body('The guest has been updated successfully.');
    }
}
