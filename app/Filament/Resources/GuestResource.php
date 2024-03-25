<?php

namespace App\Filament\Resources;

use App\Filament\Exports\GuestExporter;
use App\Filament\Resources\GuestResource\Pages;
use App\Models\Category;
use App\Models\Guest;
use App\Models\TimeSlot;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Table;

class GuestResource extends Resource
{
    protected static ?string $model = Guest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'System Management';


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
                Forms\Components\CheckboxList::make('categories')
                    ->options(
                        Category::all()
                            ->map(function ($category) {
                                return [
                                    'value' => $category->id,
                                    'label' => $category->name,
                                ];
                            })
                            ->pluck('label', 'value')
                            ->toArray()
                    )
                    ->columns(3)
                    ->gridDirection('row')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->searchable(),
                Tables\Columns\TextColumn::make('timeSlot.name')
                    ->label('Time Slot')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(GuestExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                    ])
                    ->label('Export Guests')
                    ->color('primary')
                    ->icon('heroicon-o-document')
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
            'index' => Pages\ListGuests::route('/'),
            'create' => Pages\CreateGuest::route('/create'),
            'edit' => Pages\EditGuest::route('/{record}/edit'),
        ];
    }
}
