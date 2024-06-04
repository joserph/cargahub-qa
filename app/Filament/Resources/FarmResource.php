<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FarmResource\Pages;
use App\Filament\Resources\FarmResource\RelationManagers;
use App\Models\Farm;
use App\Models\User;
use App\Services\FarmForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class FarmResource extends Resource
{
    protected static ?string $model = Farm::class;
    protected static ?string $navigationGroup = 'Infomacion Fincas';
    protected static ?int $navigationSort = 8;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $modelLabel = 'Finca';
    protected static ?string $pluralLabel = 'Fincas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(FarmForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('tradename')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->label('Nombre Comercial')
                    ->searchable(),
                TextColumn::make('ruc')
                    ->sortable()
                    ->label('RUC')
                    ->searchable(),
                TextColumn::make('phones.phone')
                    ->sortable()
                    ->label('Telefono')
                    ->searchable(),
                TextColumn::make('status')
                    ->badge()
                    ->extraAttributes(['class' => 'capitalize']),
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
                TextColumn::make('agroquality_code')
                    ->sortable()
                    ->label('Codigo Agricultura')
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
                    ->successNotificationTitle('Finca actualizado con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['name'] = Str::of($data['name'])->upper();
                        $data['tradename'] = Str::of($data['tradename'])->upper();
                        $data['address'] = Str::of($data['address'])->apa();
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->color('danger')
                    ->successNotificationTitle('Finca eliminada con exito!'),
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
            'index' => Pages\ListFarms::route('/'),
            // 'create' => Pages\CreateFarm::route('/create'),
            'view' => Pages\ViewFarm::route('/{record}'),
            'edit' => Pages\EditFarm::route('/{record}/edit'),
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
