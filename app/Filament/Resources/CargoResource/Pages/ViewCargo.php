<?php

namespace App\Filament\Resources\CargoResource\Pages;

use App\Filament\Resources\CargoResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewCargo extends ViewRecord
{
    protected static string $resource = CargoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
