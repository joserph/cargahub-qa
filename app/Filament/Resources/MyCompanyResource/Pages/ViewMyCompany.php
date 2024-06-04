<?php

namespace App\Filament\Resources\MyCompanyResource\Pages;

use App\Filament\Resources\MyCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMyCompany extends ViewRecord
{
    protected static string $resource = MyCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
