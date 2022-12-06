<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de ventas || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.ganancias')
    @section('titulo','Registro de venta')
        @section('content')
        @can('administrador')
            @if ($mensaje = Session::get('exito'))
                <div class="alert alert-success alert-dismissible fade show  position-fixed bottom-0 end-0 mx-4" role="alert" >
                    <p id="MensajeExi">{{ $mensaje }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
            <div class="row my-3">
                <div class="col-7">
                    <form action="{{ route('ventas.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="gesVentas" name="gesVentas" placeholder="Total a pagar" required>
                            <label for="gesVentas">Valor de la venta</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la venta"  value="<?php echo date("Y-n-j"); ?>"required>
                            <label for="fecha">Fecha de la venta</label>
                        </div>
                        <button type="submit"  id="guardar" class="btn btn-outline-success">Guardar</button>
                    </form>
                </div>

                <div class="col-5">
                    <div class="form-floating mb-3">
                        <table class="table table-hover ">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th>Fecha</th>
                                    <th>Valor</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            @if(count($ventas)>0)
                                <tbody>
                                    @foreach($ventas as $item)
                                        <tr class="text-center">
                                            <td>{{ $item->fecha}}</td>
                                            <td>${{number_format( $item->gesVentas) }}</td>
                                            <td class="d-flex justify-content-center">
                                                <div class="row">                         
                                                    <a href="{{ route('ventas.edit', $item->id) }}" class="btn btn-outline-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Actualizar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> 
                        </table> 
                        {{ $ventas->links() }}
                    </div>
                </div>
       

  
                @else
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p>La búsqueda no arrojó resultados.</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        @endcan
        @can('usuario')
        
        
        
        <p class="fs-4 ms-4 fa-fade">  <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>No tienes permiso para estas funciones <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>
            <a href="{{ route('clientes.index') }}" id="myTooltip" class="btn btn-outline-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
        </p>
        @endcan
    </div>
    
    @endsection
    
@section('scripts')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
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
            <script>
                const toastTrigger = document.getElementById('guardar')
                const toastLiveExample = document.getElementById('liveToast')
                if (toastTrigger) {
                    toastTrigger.addEventListener('click', () => {
                    const toast = new bootstrap.Toast(toastLiveExample)
                    
                    toast.show()
                })
            }
            
            </script>
    <script>
        const myTooltipEl = document.getElementById('myTooltip')
        const tooltip = bootstrap.Tooltip.getOrCreateInstance(myTooltipEl)

        myTooltipEl.addEventListener('hidden.bs.tooltip', () => {
         // do something...
        })

        tooltip.hide()

        


        // Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e) {
            // Para el lanzamiento del evento
            e.preventDefault();
            // Lanzar alerta de SweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el registro?',
                text: "¡Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0d6efd',
                cancelButtonColor: '#dc3545',
                confirmButtonText: '¡Si, eliminar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
                
    </script>
    <script>
        const myToastEl = document.getElementById('myToast')
        myToastEl.addEventListener('hidden.bs.toast', () => {
        // do something...
        })

    </script>
    
@endsection