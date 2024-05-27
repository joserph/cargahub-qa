<?php

namespace App\Filament\Resources\ReturnReportItemResource\Pages;

use App\Filament\Resources\ReturnReportItemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Str;

class ListReturnReportItems extends ListRecords
{
    protected static string $resource = ReturnReportItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->icon('heroicon-o-plus-circle')
                ->color('info')
                ->modalWidth(MaxWidth::FiveExtraLarge)
                ->successNotificationTitle('Reporte de devolucion creado con exito!')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['guide_number'] = Str::of($data['guide_number'])->upper();
                    
                    return $data;
                }),
        ];
    }
}
