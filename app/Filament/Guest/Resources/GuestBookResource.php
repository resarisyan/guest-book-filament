<?php

namespace App\Filament\Guest\Resources;

use App\Filament\Guest\Resources\GuestBookResource\Pages;
use App\Models\Guest;
use App\Models\TimeSlot;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class GuestBookResource extends Resource
{

    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('purpose')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('time_slot_id')
                    ->label('Time Slot')
                    ->options(
                        TimeSlot::with('room')
                            ->where('date', '>=', now()->format('Y-m-d'))
                            ->orderBy('date')
                            ->get()
                            ->map(function ($timeSlot) {
                                return [
                                    'value' => $timeSlot->id,
                                    'text' => $timeSlot->date . ' : ' . $timeSlot->room->name . ' - ' . $timeSlot->start_time . ' to ' . $timeSlot->end_time,
                                ];
                            })
                            ->pluck('text', 'value')
                            ->toArray()
                    )
                    ->required(),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\CreateGuestBook::route('/create'),
        ];
    }
}
