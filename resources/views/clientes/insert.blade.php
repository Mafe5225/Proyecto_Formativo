<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar cliente || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/logoTienda.png') }}">
</head>
<body>
    
</body>
</html>

@extends('layouts.main')

@section('titulo', ' Nuevo cliente')

@section('content')
@can('administrador')
    
<form action="{{ route('clientes.store') }}" method="post" class="needs-validation" novalidate>
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
      <label for="nombre">Nombre</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" id="cedula" name="cedula" placeholder="Cedula" minlength="0" maxlength="10" required>
      <label for="cedula">Cédula</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Telefono" minlength="0" maxlength="10" required>
      <label for="telefono">Teléfono</label>
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
      <label for="direccion">Dirección</label>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
</form>
@endcan
@can('usuario')
           
<p>No tienes permiso para estas funciones (⌣̀_⌣́)</p>
@endcan

@endsection

@section('scripts')
<script>
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
