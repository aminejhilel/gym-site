<?php

namespace App\Filament\Resources\GymSettings;

use App\Filament\Resources\GymSettings\Pages\CreateGymSetting;
use App\Filament\Resources\GymSettings\Pages\EditGymSetting;
use App\Filament\Resources\GymSettings\Pages\ListGymSettings;
use App\Filament\Resources\GymSettings\Schemas\GymSettingForm;
use App\Filament\Resources\GymSettings\Tables\GymSettingsTable;
use App\Models\GymSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GymSettingResource extends Resource
{
    protected static ?string $model = GymSetting::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GymSettingForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GymSettingsTable::configure($table);
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
            'index' => ListGymSettings::route('/'),
            'create' => CreateGymSetting::route('/create'),
            'edit' => EditGymSetting::route('/{record}/edit'),
        ];
    }
}
