@extends('layouts.main')
@section('titulo','Visualisación de la venta')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Total de la venta</th>
            <th>Fecha</th>
            
        </tr>
    </thead>
    <tbody>
        <td>{{ $clientes->venta}}</td>
        <td>  {{ $clientes->fecha }}</td>
        
    </tbody>
</table>
<a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
@endsection