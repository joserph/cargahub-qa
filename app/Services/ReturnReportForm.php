<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Dialing;
use App\Models\Disease;
use App\Models\Farm;
use App\Models\Logistic;
use App\Models\Product;
use App\Models\State;
use App\Models\Variety;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

final class ReturnReportForm
{
    protected static array $reports = [
        'devolucion'    => 'Devolucion',
        'advertencia'   => 'Advertencia',
    ];

    public static function schema(): array
    {
        return [
            Group::make()
                ->schema([
                    Forms\Components\Section::make()
                        ->schema([
                            Forms\Components\Select::make('client_id')
                                ->label('Cliente')
                                ->extraInputAttributes(['class' => 'fi-uppercase'])
                                ->columnSpan(2)
                                ->options(Client::query()->pluck('name', 'id'))
                                ->searchable()
                                ->required(),
                            Forms\Components\Select::make('logistic_id')
                                ->label('Agencia')
                                ->columnSpan(2)
                                ->options(Logistic::query()->pluck('name', 'id'))
                                ->searchable()
                                ->required(),
                            Forms\Components\DatePicker::make('date')
                                ->label('Fecha')
                                ->required(),
                            Forms\Components\Select::make('guide_type')
                                ->label('Tipo de Guia')
                                ->options(self::$guideType)
                                ->required(),
                            Forms\Components\TextInput::make('guide_number')
                                ->extraInputAttributes(['class' => 'fi-uppercase'])
                                ->label('Numero de Guia')
                                ->required(),
                            Select::make('country_id')
                                ->label('Destino')
                                ->relationship(name: 'country', titleAttribute: 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                            Forms\Components\Select::make('type_report')
                                ->label('Tipo de Informe')
                                ->options(self::$reports)
                                ->required(),
                        ])->columns([
                            'sm' => 4,
                        ]),
                    Forms\Components\Section::make()
                        ->schema([
                            Repeater::make('returnReportItems')
                                ->label('Detalle de Devoluciones')
                                ->relationship()
                                ->schema([
                                    Forms\Components\Select::make('farm_id')
                                        ->label('Finca')
                                        ->options(Farm::query()->pluck('name', 'id'))
                                        ->columnSpan(4)
                                        ->searchable()
                                        ->required(),
                                    Forms\Components\Select::make('dialing_id')
                                        ->label('Marcacion')
                                        ->columnSpan(4)
                                        ->options(Dialing::query()->pluck('name', 'id'))
                                        ->searchable()
                                        ->required(),
                                    Forms\Components\Select::make('product_id')
                                        ->label('Producto')
                                        ->options(Product::query()->pluck('name', 'id'))
                                        ->columnSpan(2)
                                        ->live()
                                        ->afterStateUpdated(fn (Set $set) => $set('variety_id', null))
                                        ->searchable()
                                        ->required(),
                                    Forms\Components\Select::make('variety_id')
                                        ->label('Variedad')
                                        ->options(fn (Get $get): Collection => Variety::query()
                                            ->where('product_id', $get('product_id'))
                                            ->pluck('name','id'))
                                        ->columnSpan(2)
                                        ->searchable()
                                        ->required(),
                                    Forms\Components\TextInput::make('hawb')
                                        ->label('HAWB')
                                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                                        ->columnSpan(2)
                                        ->required(),
                                    Forms\Components\TextInput::make('packing')
                                        ->label('Empaque')
                                        ->columnSpan(2)
                                        ->required(),
                                    Forms\Components\Select::make('diseases')
                                        ->label('Problemas')
                                        ->multiple()
                                        ->preload()
                                        ->columnSpan(3)
                                        ->required()
                                        ->relationship('diseases', 'name'),
                                    Forms\Components\TextInput::make('piece')
                                        ->label('Cantidad')
                                        ->columnSpan(1)
                                        ->numeric()
                                        ->required(),
                                    Forms\Components\Select::make('type_piece')
                                        ->label('Tipo de Piezas')
                                        ->options(self::$typePieces)
                                        ->columnSpan(2)
                                        ->required(),
                                    Forms\Components\TextInput::make('observations')
                                        ->label('Observaciones')
                                        ->columnSpan(4)
                                ])
                                ->columns(8)
                                ->defaultItems(1)
                        ])
                ])->columnSpan('full')
        ];
    }

    protected static array $guideType = [
        'maritimo'  => 'Maritimo',
        'aereo'     => 'Aereo',
    ];

    protected static array $typePieces = [
        'eb' => 'EB',
        'qb' => 'QB',
        'hb' => 'HB',
    ];
}