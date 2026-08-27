<?php

namespace App\Filament\Widgets;

use App\Models\Member;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestMembersWidget extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Latest Registered Members';

    public function table(Table $table): Table
    {
        return $table
            ->query(Member::query()->latest()->limit(5))
            ->columns([
                ImageColumn::make('photo')->circular(),
                TextColumn::make('first_name')->searchable(),
                TextColumn::make('last_name')->searchable(),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                TextColumn::make('joined_at')->date(),
            ])
            ->paginated(false);
    }
}
