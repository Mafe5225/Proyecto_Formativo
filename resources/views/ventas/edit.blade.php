<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edi registro de ventas || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.main')

  @section('titulo','Editar registro de ventas')
    @section('content')
      <form action="{{ route('ventas.update', $ventas->id) }}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
          <input type="double" class="form-control" id="gesVentas" name="gesVentas" placeholder="Venta" value="{{ $ventas->gesVentas }}" required>
          <label for="gesVentas">Valor de la venta</label>
        </div>

        <div class="form-floating mb-3">
          <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" value="{{ $ventas->fecha }}" required>
          <label for="fecha">Fecha</label>
        </div>

        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-outline-danger">Cancelar</a>
      </form>
 
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