<?php

namespace App\Filament\Resources\ForgotPasswordResource\Pages;

use App\Filament\Resources\ForgotPasswordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditForgotPassword extends EditRecord
{
    protected static string $resource = ForgotPasswordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}
