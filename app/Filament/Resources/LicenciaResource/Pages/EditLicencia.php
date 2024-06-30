<?php

namespace App\Filament\Resources\LicenciaResource\Pages;

use App\Filament\Resources\LicenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLicencia extends EditRecord
{
    protected static string $resource = LicenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
