<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>Tienda Buena vista</title>
</head>
<body class="d-flex h-100 text-center ">
    <div class="container">
        <h1 class="text-center mt-1 " id="titulo">Tienda buena vista</h1>
        <div class="my-5"></div>
        <h3 class="text-center ">Saludos te damos la bienvenida a tienda buena vista.</h3>
        
        <div class="d-flex h-100 w-100 p-3 mx-auto flex-column main-container ">
            <div class="my-4"></div>
            <main class="px-3">
                <h3>Agrega informacion de tus clientes, ingresos y prestamos.</h3>
                <td id="botones">
                    <!-- <button style="background-color:#f7c94c;border-color">Registrar nuevo cliente</button> -->
                <a href="{{ route('clientes.index') }}" class="btn  w-20">Registrar un cliente.</a> 
                <!-- <a href="#" class="btn w-20">Registrar ganancia.</a> --> 
                </td>
            </main>
        </div>
    </div>

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>