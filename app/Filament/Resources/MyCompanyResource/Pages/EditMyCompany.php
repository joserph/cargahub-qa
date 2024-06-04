<?php

namespace App\Filament\Resources\MyCompanyResource\Pages;

use App\Filament\Resources\MyCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMyCompany extends EditRecord
{
    protected static string $resource = MyCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
