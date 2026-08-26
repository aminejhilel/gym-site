<?php

namespace App\Filament\Resources\GymClasses\Schemas;

use App\Models\Coach;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GymClassForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Class Details')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        Select::make('coach_id')
                            ->label('Coach')
                            ->relationship('coach', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Coach $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('capacity')->numeric()->required(),
                        TextInput::make('duration_minutes')->numeric()->suffix('mins')->required(),
                        DateTimePicker::make('scheduled_at')->required(),
                        Select::make('status')
                            ->options([
                                'scheduled' => 'Scheduled',
                                'completed' => 'Completed',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('scheduled')
                            ->required(),
                        TextInput::make('location')->maxLength(255),
                        Textarea::make('description')->rows(3)->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
