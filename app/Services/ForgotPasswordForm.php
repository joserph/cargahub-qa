<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

final class ForgotPasswordForm
{
    public static function schema(): array
    {
        return [
            Section::make('Informacion Personal')
            ->columns(3)
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]),
            // Section::make('Direccion')
            // ->columns(3)
            // ->schema([
            //     Select::make('country_id')
            //         ->relationship(name: 'country', titleAttribute: 'name')
            //         ->searchable()
            //         ->preload()
            //         ->live()
            //         ->afterStateUpdated(function (Set $set){
            //             $set('state_id', null);
            //             $set('city_id', null);
            //         })
            //         ->required(),
            //     Select::make('state_id')
            //         ->options(fn (Get $get): Collection => State::query()
            //             ->where('country_id', $get('country_id'))
            //             ->pluck('name', 'id'))
            //         ->searchable()
            //         ->preload()
            //         ->live()
            //         ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
            //         ->required(),
            //     Select::make('city_id')
            //         ->options(fn (Get $get): Collection => City::query()
            //             ->where('state_id', $get('state_id'))
            //             ->pluck('name', 'id'))
            //         ->searchable()
            //         ->preload()
            //         ->required(),
            //     TextInput::make('address')
            //         ->required(),
            //     TextInput::make('postal_code')
            //         ->required(),
            //     Select::make('roles')
            //         ->relationship('roles', 'name')
            //         ->multiple()
            //         ->preload()
            //         ->searchable()
            // ])
            
        ];
    }
}