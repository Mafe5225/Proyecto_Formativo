<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Egresos || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.ganancias')
    @section('titulo', 'Gastos')
        @section('content')
            @if ($mensaje = Session::get('exito'))
                <div class="alert alert-success alert-dismissible fade show  position-fixed bottom-0 end-0 mx-4" role="alert" >
                    <p id="MensajeExi">{{ $mensaje }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <form action="{{ route('egresos.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
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
                    </form>
                </div>

                <div class="col">

                    @if(count($egresos)>0)
               
                        <div class="form-floating mb-3">
                            <table class="table  border-dark ">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Gastos</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($egresos as $item)
                                        <tr>
                                            <td>{{ $item->fecha }}</td>
                                            <td>{{ $item->tipo }}</td>
                                            <td>${{ number_format($item->gesEgresos) }}</td>    
                                            <td class="d-flex justify-content-center">
                                                <div class="row">                         
                                                    <a href="{{ route('egresos.edit', $item->id) }}" class="btn btn-outline-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Actualizar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
               
                        {{ $egresos->links() }}
        
                    @else
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <p>La búsqueda no arrojó resultados.</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
    
            @can('usuario')
                <p class="fs-4 ms-4 fa-fade">  <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>No tienes permiso para estas funciones <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>
                    <a href="{{ route('clientes.index') }}" id="myTooltip" class="btn btn-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
                </p>
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