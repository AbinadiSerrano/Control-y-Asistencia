<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Reporte de Asistencia</title>
</head>
<body>
    <h1>PLANILLA DE ASISTENCIA</h1>
   
    <div class="container">
            <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 85px;">Nro Carnet</th>
                <th style="width: 85px;">Fecha ingreso</th>
                <th style="width: 90px;">Nombre</th>
                <th style="width: 80px;">A.Paterno</th>
                <th style="width: 80px;">A.Materno</th>
                <th style="width: 15px;">Sexo</th>
                <th style="width: 95px;">Cargo</th>
                <th style="width: 80px;">Sueldo G</th>
                <th style="width: 60px;">AFP</th>
                <th style="width: 50px;">Faltas</th>
                <th style="width: 70px;">Sueldo L</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $asistencia)
                <tr>
                    <td>{{$asistencia->CI}}</td>
                    <td>{{$asistencia->fecha_contrato}}</td>
                    <td>{{$asistencia->nombre}}</td>
                    <td>{{$asistencia->paterno}}</td>
                    <td>{{$asistencia->materno}}</td>
                    <td>{{$asistencia->genero}}</td>
                    <td>{{$asistencia->cargos->nombre}}</td>
                    <td>{{$asistencia->sueldo}}</td>
                    <td>{{$asistencia->sueldo * 0.1221}}</td>
                    <td>{{$asistencia->horas_descuento_total}}</td>
                    <td>{{$asistencia->sueldo -(($asistencia->sueldo*0.1221)+($asistencia->horas_descuento_total * $asistencia->descuentodia))}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
   
<style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        h1{
            text-align: center;
            padding: 20px;
            font-size: 30px;
            
        }
        .container{
            font-size: 15px; 
            margin: 5px;
        }
</style>
</body>
</html>