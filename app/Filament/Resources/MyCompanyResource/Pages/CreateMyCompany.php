<?php

namespace App\Filament\Resources\MyCompanyResource\Pages;

use App\Filament\Resources\MyCompanyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyCompany extends CreateRecord
{
    protected static string $resource = MyCompanyResource::class;
}
