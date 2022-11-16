@extends('layouts.main')
@section('titulo', 'Gastos')
@section('content')

    @can('administrador')
        @if ($mensaje = Session::get('exito'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ $mensaje }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mt-3">
            <a href="{{ route('egresos.create') }}" class="btn btn-secondary">
                Registrar nuevo egreso
            </a>
        </div>
        @if(count($egresos)>0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th>Fecha</th>
                        <th>Tipo</th>
                        <th>Gastos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($egresos as $item)
                        <tr>
                            <td>{{ $item->fecha }}</td>
                            <td>{{ $item->tipo }}</td>
                            <td>${{ $item->gesEgresos }}</td>    
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $egresos->links() }}
        @else
            <p> No hay resultados.</p>
                 

       @endif
    @endcan


@endsection