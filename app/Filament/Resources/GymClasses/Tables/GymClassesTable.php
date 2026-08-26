<?php

namespace App\Filament\Resources\GymClasses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class GymClassesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('coach.first_name')
                    ->label('Coach')
                    ->formatStateUsing(fn ($record) => $record->coach?->full_name)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('scheduled_at')->dateTime()->sortable(),
                TextColumn::make('duration_minutes')->suffix(' mins')->sortable(),
                TextColumn::make('capacity')->sortable(),
                TextColumn::make('reservations_count')->counts('reservations')->label('Booked'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'scheduled' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'scheduled' => 'Scheduled',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ])
            ->defaultSort('scheduled_at', 'desc');
    }
}
