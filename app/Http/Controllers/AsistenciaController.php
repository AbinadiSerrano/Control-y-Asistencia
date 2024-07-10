<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Empleado;
use Carbon\Carbon;
use McKenziearts\Notify\Facades\Notify;


class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $accion = $request->input('btnaccion');
           if($accion=='entrada'){

           
                $CIinput = $request->get('txtCI');
                $empleado = Empleado::where('CI', $CIinput)->first();

                if (!$empleado) {
                    notify()->error('El empleado no existe', 'ERROR');
                    return view('welcome');
                }

                $fechaActual = Carbon::now()->format('y-m-d');
                $entrada = Asistencia::where('empleado_id', $empleado->id)->whereDate('entrada', $fechaActual)->first();

                //return dump($entrada);

                if ($entrada) {
                    notify()->warning('El empleado ya registro entrada el dia de hoy', 'ALERTA');
                    return view('welcome');
                }

                //hay el empleado
                $fechaHoraActual = Carbon::now('America/La_Paz'); ///capturamos la fecha y hora en tiempo real
                $nuevaAsistencia = new Asistencia(); //ingresamos a la base de datos la entrada
                $nuevaAsistencia->empleado_id = $empleado->id;
                $nuevaAsistencia->entrada = $fechaHoraActual;
                //return dump($fechaHoraActual);
                $nuevaAsistencia->save();
                notify()->success('Tu entrada ha sido registrada correctamente ', 'BIENVENIDO');
                return view('welcome');
                
           }

           if($accion == 'salida'){

                    $CIinput = $request->get('txtCI');
                $empleado = Empleado::where('CI', $CIinput)->first();

                if (!$empleado) {
                    notify()->error('El empleado no existe', 'ERROR');
                    return view('welcome');
                }

                $fechaActual = Carbon::now()->format('y-m-d');
                $entrada = Asistencia::where('empleado_id', $empleado->id)->whereDate('entrada', $fechaActual)->first();
                
                if (!$entrada) {
                    notify()->warning('El empleado no registro entrada el dia de hoy', 'ALERTA');
                    return view('welcome');
                }

                $salida = Asistencia::where('empleado_id',$empleado->id)->whereDate('salida',$fechaActual)->first();
                
                if ($salida) {  
                    notify()->warning('El empleado ya registro salida el dia de hoy', 'ALERTA');
                    return view('welcome');
                }
                
                $asistenciaSalida=$entrada;
                    
                $fechaHoraActual = Carbon::now('America/La_Paz'); ///capturamos la fecha y hora en tiempo real
                $asistenciaSalida->salida = $fechaHoraActual;
                $asistenciaSalida->save();

                notify()->success('Tu salida ha sido registrada correctamente ', 'HASTA PRONTO');
                return view('welcome');
           }

    }


    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
