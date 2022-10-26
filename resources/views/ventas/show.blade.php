@extends('layouts.main')
@section('titulo','Visualisación de la venta')
@section('content')
<table class="table table-hover ml-6" >
    <thead>
        <tr>
            <th>Total de la venta</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
  
            <td>{{ $ventas->ventas}}</td>
            <td>  {{ $ventas->fecha }}</td>
     
    </tbody>
</table>
<a href="{{ route('ventas.index') }}" class="btn btn-secondary">Volver</a>
@endsection