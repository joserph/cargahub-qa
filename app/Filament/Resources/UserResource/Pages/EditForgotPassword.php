<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\ForgotPasswordResource;
use App\Filament\Resources\UserResource;
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
