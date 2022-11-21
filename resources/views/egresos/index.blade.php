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
       
            <div class="form-floating mb-3">
                <table class="table table-bordered border-dark ">
                    <thead class="table-dark">
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
            </div>
       
            {{ $egresos->links() }}
        @else
            <p> No hay resultados.</p>
                 

       @endif
    @endcan
    @can('usuario')
           
       <p>No tienes permiso para estas funciones (⌣̀_⌣́)</p>
    @endcan


@endsection