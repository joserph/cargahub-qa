<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogisticResource\Pages;
use App\Filament\Resources\LogisticResource\RelationManagers;
use App\Models\Logistic;
use App\Models\User;
use App\Services\LogisticForm;
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

class LogisticResource extends Resource
{
    protected static ?string $model = Logistic::class;
    protected static ?string $navigationGroup = 'Parametrización';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-stack';
    protected static ?string $modelLabel = 'Agencia de Carga';
    protected static ?string $pluralLabel = 'Agencias de Carga';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(LogisticForm::schema());
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
                TextColumn::make('phones.phone')
                    ->label('Telefono'),
                ImageColumn::make('image_url')
                    ->label('Imagen'),
                TextColumn::make('address')
                    ->sortable()
                    ->label('Direccion')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('emails.email')
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
                    ->successNotificationTitle('Agencia de Carga actualizado con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['name'] = Str::of($data['name'])->upper();
                        $data['address'] = Str::of($data['address'])->apa();
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->color('danger')
                    ->successNotificationTitle('Agencia de Carga eliminada con exito!'),
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
            'index' => Pages\ListLogistics::route('/'),
            'view' => Pages\ViewLogistic::route('/{record}'),
            // 'create' => Pages\CreateLogistic::route('/create'),
            // 'edit' => Pages\EditLogistic::route('/{record}/edit'),
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
