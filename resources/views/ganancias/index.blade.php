@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            
            <th>Fecha</th>
            <th>Venta</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ventas as $item)
            <tr>
                <td>{{ $item->fecha }}</td>
                <td>{{ $item->gesVentas }}</td>    
                @endforeach
            </tr>
        </tbody>
    </table>
    <tr>
            <th>Total de las ventas: <b>$ {{ $total }}</b></th>
            
            <th><a href="{{ route('ganancias.destroy', $item->id) }}" class="btn btn-danger justify-content-start me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Visualisar"><i class="fa-solid fa-trash"></i></a></th>
            
        </tr>

@endsection