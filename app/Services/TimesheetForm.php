<?php

namespace App\Services;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

final class TimesheetForm
{
    public static function schema(): array
    {
        return [
            Select::make('calendar_id')
                ->relationship('calendar', 'name')
                ->required(),
            // Select::make('user_id')
            //     ->relationship('user', 'name')
            //     ->required(),
            Select::make('type')
                ->options([
                    'work' => 'Trabajando',
                    'pause' => 'En Pausa'
                ])
                ->required(),
            DateTimePicker::make('day_in')
                ->required(),
            DateTimePicker::make('day_out'),
        ];
    }
}