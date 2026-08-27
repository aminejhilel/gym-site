<?php

namespace App\Filament\Widgets;

use App\Models\Attendance;
use App\Models\Member;
use App\Models\Membership;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseStatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverviewWidget extends BaseStatsOverviewWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $revenue = Payment::where('status', 'paid')->sum('amount');

        return [
            Stat::make('Total Members', Member::count())
                ->description('Total registered members')
                ->descriptionIcon('heroicon-m-users')
                ->color('success'),

            Stat::make('Active Memberships', Membership::where('status', 'active')->count())
                ->description('Currently active memberships')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('info'),

            Stat::make('Total Revenue', '$'.number_format($revenue, 2))
                ->description('All time revenue')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Today\'s Attendances', Attendance::whereDate('checked_in_at', Carbon::today())->count())
                ->description('Members who checked in today')
                ->descriptionIcon('heroicon-m-arrow-right-on-rectangle')
                ->color('warning'),
        ];
    }
}
