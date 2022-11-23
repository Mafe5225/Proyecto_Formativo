<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>clientes || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset(images/logoTienda.png) }}">
</head>
<body>
    
</body>
</html>



@extends('layouts.main')

@section('titulo', 'Detalle de cliente')

@section('content')
<div class="my-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                </tr>
            </thead>
            <tbody>
                <td>{{ $clientes->nombre}}</td>
                <td>  {{ $clientes->telefono }}</td>
                <td>{{ $clientes->direccion}}</td>
            </tbody>
        </table>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
        
    </div>

@endsection