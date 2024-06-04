<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MyCompanyResource\Pages;
use App\Filament\Resources\MyCompanyResource\RelationManagers;
use App\Models\MyCompany;
use App\Models\User;
use App\Services\MyCompanyForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class MyCompanyResource extends Resource
{
    protected static ?string $model = MyCompany::class;
    protected static ?string $navigationGroup = 'Parametrización';
    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $modelLabel = 'Mi Empresa';
    protected static ?string $pluralLabel = 'Mi Empresa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(MyCompanyForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('ruc')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telefono'),
                ImageColumn::make('image_url')
                    ->label('Imagen'),
                TextColumn::make('address')
                    ->sortable()
                    ->label('Direccion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('email')
                    ->sortable()
                    ->label('Correo')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('country.name')
                    ->sortable()
                    ->label('Pais')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('state.name')
                    ->sortable()
                    ->label('Estado')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('city.name')
                    ->sortable()
                    ->label('Ciudad')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Fecha Creacion')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->color('success'),
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->color('warning')
                    ->successNotificationTitle('Mi Empresa actualizada con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['name'] = Str::of($data['name'])->upper();
                        $data['address'] = Str::of($data['address'])->apa();
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->color('danger')
                    ->successNotificationTitle('Mi Empresa eliminada con exito!'),
                Tables\Actions\RestoreAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->hidden(!User::isSuperAdmin()),
                    Tables\Actions\ForceDeleteBulkAction::make()
                        ->hidden(!User::isSuperAdmin()),
                    Tables\Actions\RestoreBulkAction::make()
                        ->hidden(!User::isSuperAdmin()),
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
            'index' => Pages\ListMyCompanies::route('/'),
            // 'create' => Pages\CreateMyCompany::route('/create'),
            'view' => Pages\ViewMyCompany::route('/{record}'),
            // 'edit' => Pages\EditMyCompany::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
