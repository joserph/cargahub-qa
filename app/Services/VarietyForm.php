<?php

namespace App\Services;

use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

final class VarietyForm
{
    public static function schema(): array
    {
        return [
            Forms\Components\Grid::make(4)
                ->schema([
                    TextInput::make('name')
                        ->autofocus()
                        ->extraInputAttributes(['class' => 'fi-uppercase'])
                        ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->label('Nombre de la Variedad')
                        ->required(),
                    Select::make('product_id')
                        // ->unique(ignoreRecord: true)
                        ->columnSpan(2)
                        ->required()
                        ->label('Producto')
                        ->preload()
                        ->relationship('product', 'name')
                        // ->options(Product::query()->pluck('name', 'id'))
                        
                ])
        ];
    }
}