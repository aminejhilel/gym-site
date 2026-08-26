<?php

namespace App\Filament\Resources\Reservations\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReservationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('member.first_name')
                    ->label('Member')
                    ->formatStateUsing(fn ($record) => $record->member?->full_name)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('gymClass.name')->label('Class')->sortable(),
                TextColumn::make('gymClass.scheduled_at')->label('Time')->dateTime()->sortable(),
                TextColumn::make('reserved_at')->dateTime()->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'reserved' => 'info',
                        'attended' => 'success',
                        'cancelled' => 'danger',
                        default => 'gray',
                    }),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ])
            ->defaultSort('reserved_at', 'desc');
    }
}
