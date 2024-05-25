<?php

namespace App\Filament\Resources\DialingResource\Pages;

use App\Filament\Resources\DialingResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewDialing extends ViewRecord
{
    protected static string $resource = DialingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
