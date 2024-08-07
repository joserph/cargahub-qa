<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReturnReportItemResource\Pages;
use App\Filament\Resources\ReturnReportItemResource\RelationManagers;
use App\Models\ReturnReportItem;
use App\Models\User;
use App\Services\ReturnReportItemForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ReturnReportItemResource extends Resource
{
    protected static ?string $model = ReturnReportItem::class;
    protected static ?string $navigationGroup = 'Seccion Informes';
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square';

    protected static ?string $modelLabel = 'Informe';

    protected static ?string $pluralLabel = 'Informes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(ReturnReportItemForm::schema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('return_report.date')
                    ->label('Fecha')
                    ->sortable()
                    ->dateTime('d-m-Y')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hawb')
                    ->label('HAWB')
                    ->extraAttributes(['class' => 'fi-uppercase'])
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('return_report.client.name')
                    ->label('Agencia')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('return_report.logistic.name')
                    ->label('Empresa de Logistica')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('piece')
                    ->label('Piezas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('diseases.name')
                    ->label('Problemas')
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
                    ->successNotificationTitle('Informe actualizado con exito!')
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['hawb'] = Str::of($data['hawb'])->upper();
                        //dd($data);
                        return $data;
                    }),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->iconSize('sm'),
                Tables\Actions\RestoreAction::make(),
                
                Action::make('pdf')
                    ->icon('heroicon-o-arrow-down-on-square')
                    ->url(fn(ReturnReportItem $record) => route('quality-control-report.pdf', $record))
                    ->openUrlInNewTab()
                    ->hidden(fn(ReturnReportItem $record): bool => is_null($record->images) ? true : false)
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
            'index' => Pages\ListReturnReportItems::route('/'),
            // 'create' => Pages\CreateReturnReportItem::route('/create'),
            'view' => Pages\ViewReturnReportItem::route('/{record}'),
            // 'edit' => Pages\EditReturnReportItem::route('/{record}/edit'),
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
