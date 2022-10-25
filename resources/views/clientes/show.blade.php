@extends('layouts.main')

@section('titulo', 'Historial')

@section('content')
    @if ($mensaje = Session::get('exitoCredito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div action="{{ route('movimientos.store') }}" method="post" class="needs-validation row my-3" novalidate>
        <div class="col-sm-3"></div>
        <div class="col-sm-6">

            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" class="form-control" minlength="0" maxlength="6" name="valor" id="valor">
            </div>
              
            <button type="submit" class="btn btn-outline-success" id="abono">Abono</button>
            <button type="submit" class="btn btn-outline-danger" id="deuda">Deuda</button>
            <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Volver</a>
        </div>
        <div class="col-sm-3"></div>
    </div>

@endsection