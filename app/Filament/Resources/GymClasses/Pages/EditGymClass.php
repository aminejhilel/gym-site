<?php

namespace App\Filament\Resources\GymClasses\Pages;

use App\Filament\Resources\GymClasses\GymClassResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGymClass extends EditRecord
{
    protected static string $resource = GymClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
