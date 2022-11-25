<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <title>Tienda Bella Vista</title>
</head>
<body>
    
    <div class="container">
        @yield('content')
    </div>
    <script src="{{ asset('css/bootstrap/js/bootstrap.bundle.js') }}"></script>
    
</body>
</html>