<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>Tienda Bella Vista</title>
</head>
<body class="d-flex h-100 text-center ">
    <div class="container">
        <h1 class="text-center mt-1 " id="titulo">Tienda Bella Vista</h1>
        <div class="my-5"></div>
        <h3 class="text-center ">Saludos te damos la bienvenida a Tienda Bella Vista.</h3>
        
        <div class="d-flex h-100 w-100 p-3 mx-auto flex-column main-container ">
            <div class="my-4"></div>
            <main class="px-3">
                <h3>Agrega información de tus clientes, ingresos y prestamos.</h3>
                <td id="botones">
                    <a href="{{ route('clientes.index') }}" class="btn  w-20">Iniciar sesión.</a> 
                </td>
            </main>
        </div>
    </div>
    
    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>