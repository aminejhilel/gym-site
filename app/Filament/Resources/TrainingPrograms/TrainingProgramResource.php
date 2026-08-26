<?php

namespace App\Filament\Resources\TrainingPrograms;

use App\Filament\Resources\TrainingPrograms\Pages\CreateTrainingProgram;
use App\Filament\Resources\TrainingPrograms\Pages\EditTrainingProgram;
use App\Filament\Resources\TrainingPrograms\Pages\ListTrainingPrograms;
use App\Filament\Resources\TrainingPrograms\Schemas\TrainingProgramForm;
use App\Filament\Resources\TrainingPrograms\Tables\TrainingProgramsTable;
use App\Models\TrainingProgram;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TrainingProgramResource extends Resource
{
    protected static ?string $model = TrainingProgram::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return TrainingProgramForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TrainingProgramsTable::configure($table);
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
            'index' => ListTrainingPrograms::route('/'),
            'create' => CreateTrainingProgram::route('/create'),
            'edit' => EditTrainingProgram::route('/{record}/edit'),
        ];
    }
}
