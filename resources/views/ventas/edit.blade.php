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
@can('administrador')
    
<form action="{{ route('ventas.update',$ventas->id) }}" method="post" class="needs-validation" novalidate>
    @method('PUT')
    @csrf
    
    <div class="form-floating mb-3">
      <input type="double" class="form-control" id="gesVentas" name="gesVentas" value="{{ ($ventas->gesVentas) }}" placeholder="Total a pagar" required>
      <label for="gesVentas">Total a pagar</label>
            </div>
       
            <div class="form-floating mb-3">
              <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la venta"  value="<?php echo date("Y-n-j"); ?>"required>
              <label for="fecha">Fecha de la venta</label>
            </div>
            <button type="submit"  id="guardar" class="btn btn-success">Guardar</button>

  </form>
@endcan
@can('usuario')
           
<a href="{{ route('clientes.index') }}" class="btn btn-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
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