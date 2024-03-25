<?php

namespace App\Filament\Exports;

use App\Models\Guest;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class GuestExporter extends Exporter
{
    protected static ?string $model = Guest::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('name')
                ->label('Name'),
            ExportColumn::make('phone')
                ->label('Phone'),
            ExportColumn::make('purpose')
                ->label('Purpose'),
            ExportColumn::make('timeSlot.room.name')
                ->label('Room'),
            ExportColumn::make('timeSlot.date')
                ->label('Date'),
            ExportColumn::make('timeSlot.start_time')
                ->label('Start Time'),
            ExportColumn::make('timeSlot.end_time')
                ->label('End Time'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your guest export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
