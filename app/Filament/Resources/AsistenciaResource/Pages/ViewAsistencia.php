<?php

namespace App\Filament\Resources\AsistenciaResource\Pages;

use App\Filament\Resources\AsistenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewAsistencia extends ViewRecord
{
    protected static string $resource = AsistenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
