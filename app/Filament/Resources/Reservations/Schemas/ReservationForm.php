<?php

namespace App\Filament\Resources\Reservations\Schemas;

use App\Models\GymClass;
use App\Models\Member;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class ReservationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Reservation Details')
                    ->schema([
                        Select::make('member_id')
                            ->label('Member')
                            ->relationship('member', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Member $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('gym_class_id')
                            ->label('Class')
                            ->relationship('gymClass', 'name')
                            ->getOptionLabelFromRecordUsing(fn (GymClass $record) => $record->name . ' (' . $record->scheduled_at->format('M d, H:i') . ')')
                            ->searchable()
                            ->preload()
                            ->required(),
                        DateTimePicker::make('reserved_at')->required()->default(now()),
                        Select::make('status')
                            ->options([
                                'reserved' => 'Reserved',
                                'attended' => 'Attended',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('reserved')
                            ->required(),
                    ])->columns(2),
            ]);
    }
}
