<?php

namespace App\Filament\Resources\ForgotPasswordResource\Pages;

use App\Filament\Resources\ForgotPasswordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListForgotPasswords extends ListRecords
{
    protected static string $resource = ForgotPasswordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
