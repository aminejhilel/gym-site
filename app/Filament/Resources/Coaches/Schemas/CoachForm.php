<?php

namespace App\Filament\Resources\Coaches\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CoachForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Coach Information')
                    ->schema([
                        TextInput::make('first_name')->required()->maxLength(255),
                        TextInput::make('last_name')->required()->maxLength(255),
                        TextInput::make('email')->email()->required()->unique(ignoreRecord: true),
                        TextInput::make('phone')->tel(),
                        TextInput::make('specialty')->maxLength(255),
                        DatePicker::make('hire_date'),
                        TextInput::make('salary')->numeric()->prefix('$'),
                        Toggle::make('is_active')->default(true),
                    ])->columns(2),

                Section::make('Bio & Photo')
                    ->schema([
                        Textarea::make('bio')->rows(4)->columnSpanFull(),
                        FileUpload::make('photo')->image()->directory('coaches')->columnSpanFull(),
                    ]),
            ]);
    }
}
