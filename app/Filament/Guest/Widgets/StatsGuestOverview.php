<?php

namespace App\Filament\Guest\Widgets;

use App\Models\Guest;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsGuestOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Guests Today', Guest::whereDate('created_at', now())->count()),
            Stat::make('Total Rooms', Room::count())
        ];
    }
}
