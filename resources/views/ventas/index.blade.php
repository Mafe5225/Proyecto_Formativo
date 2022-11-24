@extends('layouts.main')
@section('titulo','Registro de venta')
    @section('content')
    @can('administrador')
    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
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
            <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
      </form>
    @endcan
    <div class="my-3">
        @can('administrador')
        @if(count($ventas)>0)
        <div class="form-floating mb-3">
            <table class="table table-hover table-bordered border-dark">
                <thead class="table-dark">
                        <tr>
                           
                            <th>fecha</th>
                            <th>Valor</th>
                            <th>Acciones</th>
                        </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $item)
                        <tr>
                         
                            <td>{{ $item->fecha}}</td>
                            <td>${{number_format( $item->gesVentas) }}</td>
                            <td class="d-flex">
                                <a href="{{ route('ventas.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Visualisar"><i class="fa-solid fa-eye"></i></a>
                                    @can('administrador')
                                
                                        <a href="{{ route('ventas.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Actualizar"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form action="{{ route('ventas.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger rounded-circle"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eliminar">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                        </form>
                                    @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table> 
        </div>
        {{ $ventas->links() }}
     
        @else
            <p>La búsqueda no arrojó resultados.</p>
        @endif
        @endcan
        @can('usuario')
        
        

        <p class="fs-5">No tienes permiso para estas funciones <i class="fa-solid fa-face-angry fs-3 text-danger"></i>

        </p>
        @endcan
    </div>
    
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
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
    
@endsection