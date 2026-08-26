<?php

namespace App\Filament\Resources\Coaches\Pages;

use App\Filament\Resources\Coaches\CoachResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCoach extends EditRecord
{
    protected static string $resource = CoachResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
