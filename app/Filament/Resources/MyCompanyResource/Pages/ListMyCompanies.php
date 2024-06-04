<?php

namespace App\Filament\Resources\MyCompanyResource\Pages;

use App\Filament\Resources\MyCompanyResource;
use Filament\Actions;
use Illuminate\Support\Str;
use Filament\Resources\Pages\ListRecords;

class ListMyCompanies extends ListRecords
{
    protected static string $resource = MyCompanyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->successNotificationTitle('Mi Empresa creada con exito!')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['name'] = Str::of($data['name'])->upper();
                    $data['address'] = Str::of($data['address'])->apa();
                    
                    return $data;
                }),
        ];
    }
}
