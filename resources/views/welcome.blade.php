<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    
    <title>Tienda bella vista</title>
</head> 

<body class=" h-100 text-center ">
    
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container">
            <ul class="navbar-nav text-white ms-3">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Iniciar sesión
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Iniciar</a></li>
                    </ul>            
  
                </li>
            </ul>
          
        </div>
    </nav> --}}
      
      
    <div id="vista">
 
        
        <h1 class="text-center mt-8 " id="titulo">Tienda bella vista</h1>

        <div class="my-5" id="texto">
            <h3 class="text-center ">Saludos te damos la bienvenida a tienda bella vista, Tu tienda amiga.</h3>
            
            <div class="d-flex h-100 w-100 p-1 mx-auto flex-column main-container ">
                <div class="my-2"></div>
                <main class="8-px">
                    <h3>Agrega informacion de tus clientes, ingresos y prestamos.</h3>

                    <div class="d-flex h-100 w-100 p-1 mx-auto flex-column main-container ">
                        <div class="my-5"></div>
                        <main class="8-px">
                        <!-- <button style="background-color:#f7c94c;border-color">Registrar nuevo cliente</button> -->
                       
                         <a href="{{ route('clientes.index') }}" class="btn w-20" id="botones">Iniciar sesión</a> 
                    </main>
                   
                </main>
            </div>
        </div>
    </div>

    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>