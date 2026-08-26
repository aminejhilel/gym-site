<?php

namespace App\Filament\Resources\GymSettings\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class GymSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Setting Details')
                    ->schema([
                        TextInput::make('key')->required()->maxLength(255)->unique(ignoreRecord: true),
                        TextInput::make('label')->required()->maxLength(255),
                        Select::make('type')
                            ->options([
                                'text' => 'Text',
                                'boolean' => 'Boolean',
                                'integer' => 'Integer',
                            ])
                            ->required(),
                        Textarea::make('value')->required()->rows(3)->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
