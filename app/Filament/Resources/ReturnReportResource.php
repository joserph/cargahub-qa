<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReturnReportResource\Pages;
use App\Filament\Resources\ReturnReportResource\RelationManagers;
use App\Models\ReturnReport;
use App\Models\User;
use App\Services\ReturnReportForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ReturnReportResource extends Resource
{
    protected static ?string $model = ReturnReport::class;
    protected static ?string $navigationGroup = 'Seccion Informes';
    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';

    protected static ?string $modelLabel = 'Reporte de Devolucion';

    protected static ?string $pluralLabel = 'Reporte de Devoluciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(ReturnReportForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('date')
                    ->label('Fecha')
                    ->sortable()
                    ->dateTime('d-m-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('client.name')
                    ->label('Cliente')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('logistic.name')
                    ->label('Empresa de logistica')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('guide_type')
                    ->label('Tipo de Carga')
                    ->sortable()
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->searchable(),
                Tables\Columns\TextColumn::make('guide_number')
                    ->label('Nuemro de Guia')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('country.name')
                    ->label('Destino')
                    ->sortable()
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
                    ->modalWidth(MaxWidth::FiveExtraLarge)
                    ->color('warning')
                    ->successNotificationTitle('Reporte de devolucion actualizado con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['guide_number'] = Str::of($data['guide_number'])->upper();
                        // $data['hawb'] = Str::of($data['hawb'])->upper();
                        
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm'),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\Action::make('pdf')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->url(fn(ReturnReport $record) => route('return-report.pdf', $record))
                    ->openUrlInNewTab()
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
            'index' => Pages\ListReturnReports::route('/'),
            // 'create' => Pages\CreateReturnReport::route('/create'),
            'view' => Pages\ViewReturnReport::route('/{record}'),
            // 'edit' => Pages\EditReturnReport::route('/{record}/edit'),
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
