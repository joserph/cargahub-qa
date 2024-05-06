<?php

namespace App\Filament\Personal\Widgets;

use App\Models\Timesheet;
use App\Models\User;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class PersonalWidgetStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Unique views', '192.1k'),
            Stat::make('Total Work', $this->getTotalWork(Auth::user())),
            Stat::make('Total Pause', $this->getTotalPause(Auth::user())),
        ];
    }

    protected function getTotalWork(User $user)
    {
        $timesheets = Timesheet::where('user_id', $user->id)
            ->where('type', 'work')->get();
        $sumSeconds = 0;
        foreach($timesheets as $timesheet)
        {
            $startTime = Carbon::parse($timesheet->day_in);
            $finishTime = Carbon::parse($timesheet->day_out);

            $totalDuration = $finishTime->diffInSeconds($startTime);
            $sumSeconds = $sumSeconds + $totalDuration;
        }
        // dd($sumSeconds);
        $timeFormat = gmdate('H:i:s', $sumSeconds);
        return $timeFormat;
    }

    protected function getTotalPause(User $user)
    {
        $timesheets = Timesheet::where('user_id', $user->id)
            ->where('type', 'pause')->get();
        $sumSeconds = 0;
        foreach($timesheets as $timesheet)
        {
            $startTime = Carbon::parse($timesheet->day_in);
            $finishTime = Carbon::parse($timesheet->day_out);

            $totalDuration = $finishTime->diffInSeconds($startTime);
            $sumSeconds = $sumSeconds + $totalDuration;
        }
        // dd($sumSeconds);
        $timeFormat = gmdate('H:i:s', $sumSeconds);
        return $timeFormat;
    }
}
