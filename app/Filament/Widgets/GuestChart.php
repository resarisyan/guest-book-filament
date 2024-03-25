<?php

namespace App\Filament\Widgets;

use App\Models\Guest;
use Filament\Widgets\ChartWidget;

class GuestChart extends ChartWidget
{
    protected static ?string $heading = 'Guests';

    protected function getData(): array
    {
        $data = Guest::all()->groupBy(function ($guest) {
            return $guest->created_at->format('F');
        });
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Guests Book',
                    'data' => [
                        $data->get('January') ? $data->get('January')->count() : 0,
                        $data->get('February') ? $data->get('February')->count() : 0,
                        $data->get('March') ? $data->get('March')->count() : 0,
                        $data->get('April') ? $data->get('April')->count() : 0,
                        $data->get('May') ? $data->get('May')->count() : 0,
                        $data->get('June') ? $data->get('June')->count() : 0,
                        $data->get('July') ? $data->get('July')->count() : 0,
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
