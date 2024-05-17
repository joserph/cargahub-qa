<?php

namespace App\Filament\Resources\LogisticResource\Pages;

use App\Filament\Resources\LogisticResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLogistic extends ViewRecord
{
    protected static string $resource = LogisticResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
            // Actions\ForceDeleteAction::make(),
            // Actions\RestoreAction::make(),
            Actions\EditAction::make(),
        ];
    }
}
