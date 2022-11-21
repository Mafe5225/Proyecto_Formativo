<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info ventas || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.main')
@section('titulo','Visualisación de la venta')
@section('content')
<table class="table table-hover ml-6" >
    <thead class="table-dark">
        <tr>
    
            <th>Total de la venta</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody class="table-light">
  
            <td>${{ $ventas->gesVentas}}</td>
            <td>{{ $ventas->fecha }}</td>
     
    </tbody>
</table>
<a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
@endsection