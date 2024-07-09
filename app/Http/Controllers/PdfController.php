<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Asistencia;
use App\Models\Empleado;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function CrearReporte(){
        
        $fechaInicioMesAnterior = Carbon::now()->subMonth()->startOfMonth();//me devuelve el inicio del mes anterior
        $fechaFinMesAnterior = Carbon::now()->subMonth()->endOfMonth();//me devuelve el final del mes anterior

        $horas_descuento_por_empleado = Asistencia::select('empleado_id', DB::raw('SUM(horas_descuento) as horas_descuento_total'))
            ->whereMonth('entrada', '=', $fechaInicioMesAnterior->month)
            ->whereYear('entrada', '=', $fechaInicioMesAnterior->year)
            ->groupBy('empleado_id')
            ->get();
        //vota el id de empleado de la tabla asistencia sin repetirla en una fecha del mes anterior del actual

        $empleadoid = Asistencia::whereMonth('entrada', '=', $fechaInicioMesAnterior->month)
        ->whereYear('entrada', '=', $fechaInicioMesAnterior->year)
        ->distinct()
        ->pluck('empleado_id');
    
   
        //recuperamos todos los datos del empleado
       $empleados = Empleado::whereIn('id', $empleadoid)->get();

        foreach ($empleados as $empleado) {
            $horas_descuento = $horas_descuento_por_empleado->where('empleado_id', $empleado->id)->first();
            $empleado->horas_descuento_total = $horas_descuento ? $horas_descuento->horas_descuento_total : 0;
        }
          //return dump($empleados);
        $pdf = Pdf::loadView('example',compact('empleados'))->setPaper('A4', 'landscape');
        return $pdf->download('ReporteAsistencia.pdf');
    }
}
