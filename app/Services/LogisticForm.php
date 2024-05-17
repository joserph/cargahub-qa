<?php

namespace App\Services;

use App\Models\City;
use App\Models\State;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

final class LogisticForm
{
    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(3)
                ->schema([
                    Section::make('Informacion')
                        ->columns(3)
                        ->schema([
                            TextInput::make('name')
                                ->autofocus()
                                ->extraInputAttributes(['class' => 'fi-uppercase'])
                                ->columnSpan(2)
                                ->label('Nombre de la empresa')
                                ->required(),
                            TextInput::make('ruc')
                                ->numeric()
                                ->maxLength(13)
                                ->label('RUC')
                                ->required(),
                            Repeater::make('phones')
                                ->label('Tefefono')
                                ->relationship()
                                ->schema([
                                    TextInput::make('phone')
                                        ->numeric()
                                        ->prefix('+')
                                        ->label('Telefono')
                                        ->required(),
                                    TextInput::make('logistic_id')
                                        ->hidden()
                                        ->required(),
                                ])->addActionLabel('Agregar otro Telefono')
                                ->reorderable(true),
                            Repeater::make('emails')
                                ->label('Correo')
                                ->relationship()
                                ->schema([
                                    TextInput::make('email')
                                        ->label('Correo')
                                        ->email()
                                        ->required(),
                                    TextInput::make('logistic_id')
                                        ->hidden()
                                        ->required(),
                                ])->addActionLabel('Agregar otro Correo')
                                ->reorderable(true),
                            FileUpload::make('image_url')
                                ->label('Imagen de la empresa')
                                ->directory('company/')
                                ->image()
                                ->imageEditor()
                        ]),
                    Section::make('Direccion')
                        ->columns(3)
                        ->schema([
                            Select::make('country_id')
                                ->label('Pais')
                                ->relationship(name: 'country', titleAttribute: 'name')
                                ->searchable()
                                ->preload()
                                ->live()
                                ->afterStateUpdated(function (Set $set){
                                    $set('state_id', null);
                                    $set('city_id', null);
                                })
                                ->required(),
                            Select::make('state_id')
                                ->label('Estado')
                                ->options(fn (Get $get): Collection => State::query()
                                    ->where('country_id', $get('country_id'))
                                    ->pluck('name', 'id'))
                                ->searchable()
                                ->preload()
                                ->live()
                                ->afterStateUpdated(fn (Set $set) => $set('city_id', null))
                                ->required(),
                            Select::make('city_id')
                                ->label('Ciudad')
                                ->options(fn (Get $get): Collection => City::query()
                                    ->where('state_id', $get('state_id'))
                                    ->pluck('name', 'id'))
                                ->searchable()
                                ->preload()
                                ->required(),
                            TextInput::make('address')
                                ->columnSpan(2)
                                ->label('Direccion')
                                ->required(),
                        ]),
                ])
        ];
    }
}