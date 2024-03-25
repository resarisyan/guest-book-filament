<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\ChartWidget;

class GuestCategoriesChart extends ChartWidget
{
    protected static ?string $heading = 'Guest Categories';

    protected function getData(): array
    {
        $categories = Category::with('guestCategories')->get();

        return [
            'labels' => $categories->pluck('name'),
            'datasets' => [
                [
                    'label' => 'Guests Book',
                    'data' => $categories->pluck('guestCategories')->map(function ($guestCategories) {
                        return $guestCategories->count();
                    }),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
