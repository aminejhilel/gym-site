<?php

namespace App\Filament\Resources\GymClasses\Pages;

use App\Filament\Resources\GymClasses\GymClassResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGymClasses extends ListRecords
{
    protected static string $resource = GymClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
