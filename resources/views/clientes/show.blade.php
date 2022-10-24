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