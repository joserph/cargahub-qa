<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiseaseResource\Pages;
use App\Filament\Resources\DiseaseResource\RelationManagers;
use App\Models\Disease;
use App\Models\User;
use App\Services\DiseaseForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class DiseaseResource extends Resource
{
    protected static ?string $model = Disease::class;
    protected static ?string $navigationGroup = 'Parametrización';
    protected static ?int $navigationSort = 7;

    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';

    protected static ?string $modelLabel = 'Enfermedad';

    protected static ?string $pluralLabel = 'Enfermedades';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(DiseaseForm::schema());
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
                Tables\Columns\TextColumn::make('type')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->label('Tipo')
                    ->searchable(),
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
                    ->successNotificationTitle('Enfermedad actualizada con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['name'] = Str::of($data['name'])->upper();
                        
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
            'index' => Pages\ListDiseases::route('/'),
            // 'create' => Pages\CreateDisease::route('/create'),
            'view' => Pages\ViewDisease::route('/{record}'),
            // 'edit' => Pages\EditDisease::route('/{record}/edit'),
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
