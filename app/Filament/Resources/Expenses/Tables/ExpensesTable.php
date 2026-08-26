<?php

namespace App\Filament\Resources\Expenses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ExpensesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('amount')->money('USD')->sortable(),
                TextColumn::make('category')->badge()->color('info'),
                TextColumn::make('expense_date')->date()->sortable(),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'equipment' => 'Equipment',
                        'utilities' => 'Utilities',
                        'salaries' => 'Salaries',
                        'maintenance' => 'Maintenance',
                        'marketing' => 'Marketing',
                        'other' => 'Other',
                    ]),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ])
            ->defaultSort('expense_date', 'desc');
    }
}
