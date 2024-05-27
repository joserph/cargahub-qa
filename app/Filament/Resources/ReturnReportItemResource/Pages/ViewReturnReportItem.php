<?php

namespace App\Filament\Resources\ReturnReportItemResource\Pages;

use App\Filament\Resources\ReturnReportItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewReturnReportItem extends ViewRecord
{
    protected static string $resource = ReturnReportItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
