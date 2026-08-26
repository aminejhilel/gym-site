<?php

namespace App\Filament\Resources\TrainingPrograms\Pages;

use App\Filament\Resources\TrainingPrograms\TrainingProgramResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTrainingPrograms extends ListRecords
{
    protected static string $resource = TrainingProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
