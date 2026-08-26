<?php

namespace App\Filament\Resources\Exercises\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExerciseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Exercise Details')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        Select::make('muscle_group')
                            ->options([
                                'Chest' => 'Chest',
                                'Back' => 'Back',
                                'Legs' => 'Legs',
                                'Shoulders' => 'Shoulders',
                                'Arms' => 'Arms',
                                'Core' => 'Core',
                                'Full Body' => 'Full Body',
                                'Glutes' => 'Glutes',
                            ])
                            ->required(),
                        Select::make('difficulty')
                            ->options([
                                'beginner' => 'Beginner',
                                'intermediate' => 'Intermediate',
                                'advanced' => 'Advanced',
                            ])
                            ->required(),
                        TextInput::make('video_url')->url()->maxLength(255),
                        Textarea::make('description')->rows(3)->columnSpanFull(),
                        Textarea::make('instructions')->rows(5)->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
