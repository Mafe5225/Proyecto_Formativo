<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info clientes || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>@extends('layouts.main')

@section('titulo', 'Información del cliente')

@section('content')

    <div class="row my-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <td class="fw-bold">Nombre</td>
                        <td>{{ $clientes->nombre }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Cédula</td>
                        <td>{{ $clientes->cedula }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Teléfono</td>
                        <td>{{ $clientes->telefono }}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Dirección</td>
                        <td>{{ $clientes->direccion }}</td>
                    </tr>
                </tbody>
            </table>
    
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
        <div class="col-sm-3"></div>
    </div>
    
@endsection