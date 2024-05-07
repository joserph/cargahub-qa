<?php

namespace App\Filament\Personal\Widgets;

use App\Models\Timesheet;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Facades\Auth;

class TimesheetsChart extends ChartWidget
{
    protected static ?string $heading = 'Timesheets Chart';

    protected function getData(): array
    {
        $data = Trend::query(Timesheet::where('user_id', Auth::user()->id))
            ->dateColumn('day_in')
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();
    
        return [
            'datasets' => [
                [
                    'label' => 'Timesheets',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
