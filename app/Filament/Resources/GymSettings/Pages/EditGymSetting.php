<?php

namespace App\Filament\Resources\GymSettings\Pages;

use App\Filament\Resources\GymSettings\GymSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGymSetting extends EditRecord
{
    protected static string $resource = GymSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
