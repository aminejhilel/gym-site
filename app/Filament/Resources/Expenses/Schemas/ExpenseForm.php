<?php

namespace App\Filament\Resources\Expenses\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ExpenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Expense Details')
                    ->schema([
                        TextInput::make('title')->required()->maxLength(255),
                        TextInput::make('amount')->numeric()->prefix('$')->required(),
                        Select::make('category')
                            ->options([
                                'equipment' => 'Equipment',
                                'utilities' => 'Utilities',
                                'salaries' => 'Salaries',
                                'maintenance' => 'Maintenance',
                                'marketing' => 'Marketing',
                                'other' => 'Other',
                            ])
                            ->required(),
                        DatePicker::make('expense_date')->required()->default(now()),
                        Textarea::make('notes')->rows(3)->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
