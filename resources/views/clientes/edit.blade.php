<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar info del cliente || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/logoTienda.png') }}">
</head>
<body>
    
</body>
</html>

@extends('layouts.main')

@section('titulo', 'Editar información del cliente')

@section('content')
    <form action="{{ route('clientes.update', $clientes->id) }}" method="post" class="needs-validation"  novalidate>
        @method('PUT')
        @csrf
        
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $clientes->nombre}}" required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cedula" value="{{ $clientes->cedula }}" required>
            <label for="cedula">Cédula</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" minlength="0" maxlength="10"  value="{{ $clientes->telefono }}"  required>
            <label for="telefono">Teléfono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="{{ $clientes->direccion }}" required>
            <label for="direccion">Dirección</label>
        </div>


        <button type="submit" class="btn btn-secondary">Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection

@section('scripts')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
             event.preventDefault()
             event.stopPropagation()
         }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    </script>

@endsection