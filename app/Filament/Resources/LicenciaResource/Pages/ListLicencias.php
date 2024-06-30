<?php

namespace App\Filament\Resources\LicenciaResource\Pages;

use App\Filament\Resources\LicenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLicencias extends ListRecords
{
    protected static string $resource = LicenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
