<?php

namespace App\Filament\Resources\TrainingPrograms\Schemas;

use App\Models\Coach;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TrainingProgramForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Program Details')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        Select::make('coach_id')
                            ->label('Coach')
                            ->relationship('coach', 'first_name')
                            ->getOptionLabelFromRecordUsing(fn (Coach $record) => $record->full_name)
                            ->searchable()
                            ->preload()
                            ->required(),
                        TextInput::make('duration_weeks')->numeric()->suffix('weeks')->required(),
                        Select::make('level')
                            ->options([
                                'beginner' => 'Beginner',
                                'intermediate' => 'Intermediate',
                                'advanced' => 'Advanced',
                            ])
                            ->required(),
                        Toggle::make('is_active')->default(true),
                        Textarea::make('description')->rows(3)->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
