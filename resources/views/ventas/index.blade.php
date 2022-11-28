@extends('layouts.ganancias')
@section('titulo','Registro de venta')
    @section('content')
    @can('administrador')
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif
    
    <div class="row my-3">
        <div class="col">
            
            <form action="{{ route('ventas.store') }}" method="post" class="needs-validation" novalidate>
                @csrf
                
                <div class="form-floating mb-3">
                  <input type="double" class="form-control" id="gesVentas" name="gesVentas" placeholder="Total a pagar" required>
                  <label for="gesVentas">Total a pagar</label>
                        </div>
                   
                        <div class="form-floating mb-3">
                          <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la venta"  value="<?php echo date("Y-n-j"); ?>"required>
                          <label for="fecha">Fecha de la venta</label>
                        </div>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    
              </form>
            @endcan
        </div>
            @can('administrador')
            <div class="col">
                
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
                                            @can('administrador')
                                            <div class="row  ">                         
                                                <a href="{{ route('ventas.edit', $item->id) }}" class="btn btn-outline-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Actualizar"><i class="fa-solid fa-pen-to-square"></i></a>
                                                {{-- <form action="{{ route('ventas.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger rounded-circle"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                </form> --}}
                                            @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody> 
                    </table> 
                    {{ $ventas->links() }}
                </div>
             
            </div>
            </div>
        @else
            <p>La búsqueda no arrojó resultados.</p>
        @endif
        @endcan
        @can('usuario')
        
        

        <p class="fs-4 ms-4 fa-fade">  <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>No tienes permiso para estas funciones <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>
            <a href="{{ route('clientes.index') }}" id="myTooltip" class="btn btn-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
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