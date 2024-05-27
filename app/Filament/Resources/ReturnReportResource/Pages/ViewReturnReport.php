<?php

namespace App\Filament\Resources\ReturnReportResource\Pages;

use App\Filament\Resources\ReturnReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReturnReport extends ViewRecord
{
    protected static string $resource = ReturnReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
