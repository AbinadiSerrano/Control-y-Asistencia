<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    

    <title>CONTROL DE ASISTENCIA</title>
    @notifyCss
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    
</head>
<body >
    <div class="contenedor">
        <h1 class="titulo">REGISTRA TU ASISTENCIA</h1>
        <h2 id="fecha"></h2>
        <div class="container">
            <a href="{{ url('admin') }} "class="acceso">Ingresar al Sistema</a>
            <p class="carnet">Ingrese su numero de carnet</p>
            <form action= "{{ asset ('asistencia') }}" method="POST">
                @csrf
                <input type="number" placeholder="CI del empleado" name="txtCI">
                <div class="botones">
                <button type="submit" class="entrada" name="btnaccion"value="entrada">ENTRADA</button>
                <button type="submit"class="salida" name ="btnaccion"value="salida">SALIDA</button>
            </div>
            <div>
            </div>
            </form>
        
        </div>   
    
        <script>
            setInterval(() => {
                let fecha = new Date();
                let fechaHora = fecha.toLocaleString();
                document.getElementById("fecha").textContent = fechaHora;
            }, 1000);
        
        </script>
        @include('notify::components.notify')
        @notifyJs
    </div>
</body>
</html>