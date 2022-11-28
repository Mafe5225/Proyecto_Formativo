<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <title>Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body id="fondo">
    <div id="Inincio">
        

                    <img src="{{ asset('images/logoTienda.png') }}" style="width: 350px" > 
         

                <div>
                    <a href="inicio" class="btn btn-dark" id="btnInicio">Clientes</a>
                    {{-- <a href="{{route('ventas.index') }}" class="btn btn-dark btnVentas translate-middle">Ventas</a>
                    <a href="{{route('egresos.index') }}" class="btn btn-dark btnEgresos translate-middle">Egresos</a>
                    <a href="{{route('ganancias.index') }}" class="btn btn-dark btnGanancias translate-middle">Ganancias</a> --}}
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
</body>
</html>