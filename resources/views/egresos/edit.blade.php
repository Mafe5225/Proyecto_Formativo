<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edi registro de egresos || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.main')

    @section('content')
      <form action="{{ route('egresos.update', $egresos->id) }}" method="post" class="needs-validation" novalidate>
        @csrf
        @method('PUT')
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la egreso"  value="<?php echo date("y-n-j"); ?>" required>
            <label for="fecha">Fecha del gasto</label>
        </div>
        <div class="form-floating mb-3">
            <input type="double" class="form-control" id="tipo" name="tipo" placeholder="Tipo de egresos" required>
            <label for="tipo">Tipo de gasto</label>
        </div>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="gesEgresos" name="gesEgresos" placeholder="Egreso a registrar" required>
            <label for="gesEgresos">Valor del egreso a registrar</label>
        </div>

        <button type="submit" class="btn btn-outline-success">Guardar</button>
        <a href="{{ route('egresos.index') }}" class="btn btn-outline-danger">Cancelar</a>
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