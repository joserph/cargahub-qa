<?php

namespace App\Filament\Resources\ReturnReportResource\Pages;

use App\Filament\Resources\ReturnReportResource;
use App\Models\ReturnReport;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Str;

class ListReturnReports extends ListRecords
{
    protected static string $resource = ReturnReportResource::class;

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
                    // $data['hwba'] = Str::of($data['hwba'])->upper();
                    
                    return $data;
                }),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [];
        
        if(User::isSuperAdmin())
        {
            $tabs['active'] = Tab::make('Activos')
                ->badge(ReturnReport::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(ReturnReport::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            $tabs['active'] = Tab::make('Activos')
                ->badge(ReturnReport::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
