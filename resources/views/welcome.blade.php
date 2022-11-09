<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }} " id=" fondo">
  
    
    <title>Tienda bella vista</title>
</head> 


    <body class=" fondo h-100 text-center ">

        <div class="position-relative">
            <img src="{{ asset('image/T-Bella.png') }}" class="position-absolute top-0 start-50 translate-middle"  id="imagen" > 
        </div>
        <div id="vista">
            <b>
                 <div class="my-5 text-center" id="texto">

                <h3 class="text-center bold ">Saludos te damos la bienvenida a la tienda bella vista, Tu tienda amiga.</h3>

                <div class="d-flex h-100 w-100 p-1 mx-auto flex-column main-container ">
                    <div class="my-2"></div>
                    <main class="8-px"> 
                        <h3>Agrega Informacion de Tus Ingresos y Prestamos.</h3>

                        <div class="d-flex h-100 w-100 p-1 mx-auto flex-column main-container ">
                            <div class="my-5"></div>
                            <main class="8-px">
                            <a href="{{ route('clientes.index') }}" class="btn btn-ligth btnllg w-10" id="botones">Iniciar sesión</a> 

                        </main>                 
                    </main>
               
                </div>
            </div>
         </b>
        </div>

        <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    </body>
</html>