<?php

namespace App\Filament\Resources\ReturnReportItemResource\Pages;

use App\Filament\Resources\ReturnReportItemResource;
use App\Models\ReturnReportItem;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Components\Tab;
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
                    $data['hawb'] = Str::of($data['hawb'])->upper();
                    
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
                ->badge(ReturnReportItem::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });

            $tabs['archived'] = Tab::make('Archivadas')
                ->badge(ReturnReportItem::onlyTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->onlyTrashed();
                });
        }else{
            $tabs['active'] = Tab::make('Activos')
                ->badge(ReturnReportItem::withoutTrashed()->count())
                ->modifyQueryUsing(function($query){
                    return $query->withoutTrashed();
                });
        }
        
        return $tabs;
    }
}
