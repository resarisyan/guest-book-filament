<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Guest;
use App\Models\Room;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsAdminOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Guests Today', Guest::whereDate('created_at', now())->count()),
            Stat::make('Total Guests', Guest::count()),
            Stat::make('Total Rooms', Room::count()),
            Stat::make('Total Categories', Category::count()),
        ];
    }
}
