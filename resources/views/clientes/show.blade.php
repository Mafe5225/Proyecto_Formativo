@extends('layouts.main')

@section('titulo', 'Detalle de cliente')

@section('content')
    @if ($mensaje = Session::get('exitoCredito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                        <td class="fw-bold">Teléfono</td>
                        <td>{{ $clientes->telefono }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{ route('movimientos.create') }}" class="btn btn-secondary">Fiar</a>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
        </div>
        <div class="col-sm-3"></div>
    </div>

@endsection