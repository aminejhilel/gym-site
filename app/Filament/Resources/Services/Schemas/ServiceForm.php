<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service Details')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('price')->numeric()->prefix('$')->required(),
                        TextInput::make('icon')->maxLength(255),
                        Toggle::make('is_active')->default(true),
                        Textarea::make('description')->rows(3)->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
