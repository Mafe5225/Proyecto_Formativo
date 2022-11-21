@extends('layouts.main')
@section('titulo','Visualisación de la venta')
@section('content')
@can('administrador')

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
@endcan
@can('usuario')
           
<p>No tienes permiso para estas funciones (⌣̀_⌣́)</p>
@endcan

@endsection