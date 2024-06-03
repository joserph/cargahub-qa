<?php

namespace App\Services;

use App\Models\Dialing;
use App\Models\Disease;
use App\Models\Farm;
use App\Models\ReturnReportItemDisease;
use App\Models\Variety;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Forms\Set;

final class ReturnReportItemForm
{
    public static function schema(): array
    {
        return [
            Grid::make()
            ->schema([
                Section::make()
                    ->schema([
                        Hidden::make('id'),
                        Forms\Components\Select::make('farm_id')
                            ->label('Finca')
                            ->columnSpan(3)
                            ->options(Farm::query()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('dialing_id')
                            ->label('Marcacion')
                            ->columnSpan(3)
                            ->options(Dialing::query()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\Select::make('variety_id')
                            ->label('Variedad')
                            ->columnSpan(2)
                            ->options(Variety::query()->pluck('name', 'id'))
                            ->preload()
                            ->searchable()
                            ->required(),
                        Forms\Components\TextInput::make('hawb')
                            ->label('HAWB')
                            ->extraInputAttributes(['class' => 'fi-uppercase'])
                            ->required(),
                        Forms\Components\TextInput::make('packing')
                            ->label('Empaque')
                            ->required(),
                        Forms\Components\TextInput::make('piece')
                            ->label('Cantidad')
                            ->columnSpan(1)
                            ->numeric()
                            ->required(),
                        Forms\Components\Select::make('type_piece')
                            ->label('Tipo de Piezas')
                            ->options(self::$typePieces)
                            ->preload()
                            ->required(),
                        Forms\Components\Select::make('diseases')
                            ->label('Problemas')
                            ->columnSpan(3)
                            ->disabled()
                            ->preload()
                            ->multiple()
                            ->relationship('diseases', 'name'),
                        Forms\Components\TextInput::make('observations')
                            ->label('Observaciones')
                            ->columnSpan(3),
                        Section::make('')
                            ->schema([
                                Repeater::make('returnReportItemDisease')
                                    ->label('Detalle de Enfermedades')
                                    ->relationship()
                                    ->schema([
                                        Forms\Components\Select::make('disease_id')
                                            ->relationship('disease', 'name')
                                            ->columnSpan(3)
                                            ->disabled()
                                            ->label('Nombre Enfermedad'),
                                        Forms\Components\TextInput::make('percentage')
                                            ->label('Porcentaje')
                                            ->numeric()
                                            ->minValue(1)
                                            ->maxValue(100)
                                    ])->grid(2)
                                    ->columns(4)
                                    ->live()
                                    ->afterStateUpdated(function (Get $get, Set $set){
                                        self::updatePercent($get, $set);
                                    })
                                    ->addable(false)
                                    ->deletable(false)
                                    
                                ]),
                            TextInput::make('qualification')
                                ->label('Calificacion Finca')
                                ->numeric()
                                ->readOnly()
                                ->prefix('%')
                                ->afterStateHydrated(function (Get $get, Set $set){
                                    self::updatePercent($get, $set);
                                })
                    ])->columns(6),
                    
                    Section::make()
                        ->schema([
                            FileUpload::make('images')
                                ->label('Imagenes')
                                ->multiple()
                                ->directory('reports_images/'. date('Y') .'-' . date('m'))
                                ->image()
                                ->imageEditor()
                                ->uploadProgressIndicatorPosition('center')
                                ->required()
                                ->reorderable()
                                ->optimize('webp')
                                ->resize(90)
                                ->imagePreviewHeight('100')
                                ->minFiles(2)
                                ->maxFiles(25)
                        ])->columnSpan(4)
                
                ])->columns(4)
        ];
    }
    
    public static function updatePercent(Get $get, Set $set): void
    {
        // Selecciono todos los valores del Repeater
        $selectDisease = collect($get('returnReportItemDisease'));
        $totalPercent = $selectDisease->reduce(function ($totalPercent, $disease){
            // dd($totalPercent);
            return intval($totalPercent) + intval($disease['percentage']);
        }, 0);

        $set('qualification', $totalPercent);
    }

    protected static array $guideType = [
        'matitimo'  => 'Maritimo',
        'aereo'     => 'Aereo',
    ];

    protected static array $typePieces = [
        'eb' => 'EB',
        'qb' => 'QB',
        'hb' => 'HB',
    ];
}