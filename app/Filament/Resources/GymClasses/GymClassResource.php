<?php

namespace App\Filament\Resources\GymClasses;

use App\Filament\Resources\GymClasses\Pages\CreateGymClass;
use App\Filament\Resources\GymClasses\Pages\EditGymClass;
use App\Filament\Resources\GymClasses\Pages\ListGymClasses;
use App\Filament\Resources\GymClasses\Schemas\GymClassForm;
use App\Filament\Resources\GymClasses\Tables\GymClassesTable;
use App\Models\GymClass;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GymClassResource extends Resource
{
    protected static ?string $model = GymClass::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GymClassForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GymClassesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGymClasses::route('/'),
            'create' => CreateGymClass::route('/create'),
            'edit' => EditGymClass::route('/{record}/edit'),
        ];
    }
}
