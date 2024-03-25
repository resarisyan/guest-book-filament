<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\GuestResource;
use App\Models\Guest;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    // public Model | string | null $model = Guest::class;
    public function fetchEvents(array $fetchInfo): array
    {

        return Guest::selectRaw('time_slot_id, count(*) as count')
            ->groupBy('time_slot_id')
            ->get()
            ->map(function ($guest) {
                return [
                    'id' => $guest->time_slot_id,
                    'title' => $guest->count . ' People',
                    'start' => $guest->timeSlot->date . 'T' . $guest->timeSlot->start_time,
                    'end' => $guest->timeSlot->date . 'T' . $guest->timeSlot->end_time,
                    'url' => GuestResource::getUrl(name: 'index'),
                    'shouldOpenUrlInNewTab' => true,
                ];
            })
            ->all();
    }

    public static function canView(): bool
    {
        return false;
    }
}
