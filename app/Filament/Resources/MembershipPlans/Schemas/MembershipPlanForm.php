<?php

namespace App\Filament\Resources\MembershipPlans\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MembershipPlanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Plan Details')
                    ->schema([
                        TextInput::make('name')->required()->maxLength(255),
                        TextInput::make('price')->numeric()->prefix('$')->required(),
                        TextInput::make('duration_days')->numeric()->suffix('days')->required(),
                        Toggle::make('is_active')->default(true),
                        Textarea::make('description')->rows(3)->columnSpanFull(),
                    ])->columns(2),

                Section::make('Features')
                    ->schema([
                        Repeater::make('features')
                            ->simple(
                                TextInput::make('feature')->placeholder('e.g. Unlimited gym access')
                            )
                            ->columnSpanFull()
                            ->addActionLabel('Add Feature'),
                    ]),
            ]);
    }
}
