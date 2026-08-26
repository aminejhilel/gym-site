<?php

namespace App\Filament\Resources\GymSettings\Pages;

use App\Filament\Resources\GymSettings\GymSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGymSettings extends ListRecords
{
    protected static string $resource = GymSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
