<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>@yield('titulo')</title>
</head>
<body class="fondo">
<nav class="navbar navbar-expand-lg shadow" id="navbar">
    <img src="{{ asset('images/logoTiendaNavbar.png') }}" alt="Logo Tienda Bella Vista" class="logo ms-4">
        <div class="container">

        @can('administrador')
            <ul class="navbar-nav text-white  position-absolute mt-1 end-0" id="ges">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-inbox  fa-beat-fade mx-2"></i> Gestiones
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Gestión de clientes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('ventas.index') }}">Gestión de ventas</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('egresos.index') }}">Gestión de egresos </a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('ganancias.index') }}">Gestion de ganancias </a></li>
                    </ul>
                </li>
            </ul>
        @endcan

            <ul class="navbar-nav text-white position-absolute mt-1 end-0 me-4" >
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @can(['administrador'])
                            <i class="fa-solid fa-user-tie"></i> 
                        @endcan
                        @can(['usuario'])
                            <i class="fa-solid fa-user"></i>
                        @endcan
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
          
        </div>
    </nav>

    <h1 class="text-center mt-4">@yield('titulo')</h1>

    <div class="my-3 container">
        @yield('content')
    </div>


    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    @yield('scripts')
</body>
</html>