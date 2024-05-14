<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ForgotPasswordResource\Pages;
use App\Filament\Resources\ForgotPasswordResource\RelationManagers;
use App\Models\ForgotPassword;
use App\Models\User;
use App\Services\ForgotPasswordForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;

class ForgotPasswordResource extends Resource
{
    protected static ?string $model = ForgotPassword::class;
    protected static ?string $navigationGroup = 'Gestion de Usuarios';
    protected static ?string $modelLabel = 'Recuperar Contraseña';
    protected static ?string $pluralLabel = 'Recuperar Contraseñas';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        // dd($form);
        return $form
            ->schema(ForgotPasswordForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('address')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('postal_code')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    // ->url('users/{record}/edit')
                    ->iconButton()
                    ->iconSize('sm')
                    ->slideOver()
                    ->color('warning')
                    ->successNotificationTitle('Cliente actualizado con exito!'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListForgotPasswords::route('/'),
            // 'create' => Pages\CreateForgotPassword::route('/create'),
            'edit' => UserResource\Pages\EditForgotPassword::route('/{record}/edit'),
        ];
    }
}
