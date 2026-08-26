<?php

namespace App\Filament\Resources\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttendancesTable
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
                TextColumn::make('membership.plan.name')->label('Plan')->sortable(),
                TextColumn::make('checked_in_at')->dateTime()->sortable(),
                TextColumn::make('checked_out_at')->dateTime()->sortable(),
                TextColumn::make('method')->badge()->color('info'),
            ])
            ->filters([])
            ->recordActions([EditAction::make()])
            ->toolbarActions([
                BulkActionGroup::make([DeleteBulkAction::make()]),
            ])
            ->defaultSort('checked_in_at', 'desc');
    }
}
