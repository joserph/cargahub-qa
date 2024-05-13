<?php

namespace App\Filament\Resources\ForgotPasswordResource\Pages;

use App\Filament\Resources\ForgotPasswordResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateForgotPassword extends CreateRecord
{
    protected static string $resource = ForgotPasswordResource::class;
}
