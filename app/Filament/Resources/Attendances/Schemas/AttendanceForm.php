<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Models\Member;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AttendanceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Attendance Details')
                    ->schema([
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Member $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('membership_id', null)),
                        Select::make('membership_id')
                            ->label('Membership')
                            ->options(function (callable $get) {
                                $member = Member::find($get('member_id'));
                                if (! $member) return [];
                                return $member->memberships->mapWithKeys(function ($m) {
                                    return [$m->id => $m->plan->name . ' (' . $m->start_date->format('M d') . ' - ' . $m->end_date->format('M d') . ')'];
                                });
                            })
                            ->required(),
                        DateTimePicker::make('checked_in_at')->required()->default(now()),
                        DateTimePicker::make('checked_out_at'),
                        Select::make('method')
                            ->options([
                                'qr' => 'QR Code',
                                'manual' => 'Manual',
                            ])
                            ->default('manual')
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
