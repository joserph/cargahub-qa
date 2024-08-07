<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DialingResource\Pages;
use App\Filament\Resources\DialingResource\RelationManagers;
use App\Models\Dialing;
use App\Models\User;
use App\Services\DialingForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class DialingResource extends Resource
{
    protected static ?string $model = Dialing::class;
    protected static ?string $navigationGroup = 'Parametrización';
    protected static ?int $navigationSort = 6;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    protected static ?string $modelLabel = 'Marcacion';

    protected static ?string $pluralLabel = 'Marcaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(DialingForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->label('Nombre')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('phones.phone')
                //     ->sortable()
                //     ->label('Telefono')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->extraAttributes(['class' => 'capitalize']),
                // Tables\Columns\TextColumn::make('address')
                //     ->sortable()
                //     ->label('Direccion')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('emails.email')
                //     ->sortable()
                //     ->label('Correo')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('country.name')
                //     ->sortable()
                //     ->label('Pais')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('state.name')
                //     ->sortable()
                //     ->label('Estado')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('city.name')
                //     ->sortable()
                //     ->label('Ciudad')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('zip_code')
                //     ->sortable()
                //     ->label('Zip Code')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('logistic.name')
                //     ->sortable()
                //     ->label('Empresa de Logistica')
                //     ->searchable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->label('Fecha Creacion')
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
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
                    // ->slideOver()
                    ->color('warning')
                    ->successNotificationTitle('Cliente actualizado con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['name'] = Str::of($data['name'])->upper();
                        // $data['address'] = Str::of($data['address'])->apa();
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm'),
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
            'index' => Pages\ListDialings::route('/'),
            // 'create' => Pages\CreateDialing::route('/create'),
            'view' => Pages\ViewDialing::route('/{record}'),
            // 'edit' => Pages\EditDialing::route('/{record}/edit'),
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
