<?php

namespace App\Filament\Resources\LicenciaResource\Pages;

use App\Filament\Resources\LicenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLicencia extends ViewRecord
{
    protected static string $resource = LicenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
