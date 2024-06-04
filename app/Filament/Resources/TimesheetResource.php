<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimesheetResource\Pages;
use App\Filament\Resources\TimesheetResource\RelationManagers;
use App\Models\Timesheet;
use App\Services\TimesheetForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;

class TimesheetResource extends Resource
{
    protected static ?string $model = Timesheet::class;
    protected static ?string $navigationGroup = 'Gestion de Usuarios';
    protected static ?int $navigationSort = 12;
    protected static ?string $modelLabel = 'Hoja de hora';
    protected static ?string $pluralLabel = 'Hojas de horas';
    protected static ?string $navigationIcon = 'heroicon-c-identification';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema(TimesheetForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match($state)
                    {
                        'work' => 'success',
                        'pause' => 'danger'
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('day_in')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('day_out')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('type')
                ->options([
                    'work' => 'Trabajando',
                    'pause' => 'En Pausa',
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->iconButton()
                    ->iconSize('sm')
                    ->color('warning')
                    ->successNotificationTitle('Hojas de horas actualizado con exito!'),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTimesheets::route('/'),
            // 'create' => Pages\CreateTimesheet::route('/create'),
            // 'edit' => Pages\EditTimesheet::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ])->where('user_id', Auth::user()->id)->orderBy('id', 'desc');
    }
}
