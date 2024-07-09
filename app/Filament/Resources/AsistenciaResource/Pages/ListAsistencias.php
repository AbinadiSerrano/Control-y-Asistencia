<?php

namespace App\Filament\Resources\AsistenciaResource\Pages;

use App\Filament\Resources\AsistenciaResource;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\Pdf;

class ListAsistencias extends ListRecords
{
    protected static string $resource = AsistenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\CreateAction::make(),
            Action::make('createPdf')
            ->label('Generar Reporte')
            ->color('info')
            ->requiresConfirmation()
            ->url(
                fn():string => route('pdf.example'),
                shouldOpenInNewTab: true
            ),
        ];
    }
    public function query(): Builder
    {
        return Asistencia::query()
            ->with(['empleados.cargo']); // Carga la relación para mostrar el nombre del cargo
    }
}
