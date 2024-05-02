<?php

namespace App\Services;

use Filament\Forms\Components\TextInput;

final class DepartmentForm
{
    public static function schema(): array
    {
        return [
            TextInput::make('name')
                    ->required()
        ];
    }
}