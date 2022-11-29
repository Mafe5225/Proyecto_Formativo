@extends('layouts.ganancias')
@section('titulo', 'Total de ganancias')
@section('content')
@can('administrador')

    @if(count($egresos)>0 or count($ventas)>0)  
        
    <div class="row ">
        <div class="col " id="scroll">
            <div class="form-floating mb-3">
                <table class="table table-bordered border-Secondary ">
                    <thead class="table-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Ventas</th>
                            </tr>
                    </thead>
                    <tbody>
                            <tr>
                                @foreach($ventas as $item) 
                                <tr class="bg-success bg-opacity-50">
                                    <td>{{ $item->fecha }}</td>
                                    <td>${{ number_format($item->gesVentas) }}</td> 
                                </tr>
                                @endforeach
                            </tr>
                    </tbody>
                </table> 
                {{ $ventas->links() }}
            </div>
        </div>



        <div class="col overflow-scroll" id="scroll">
            <div class="form-floating mb-3">
                <table class="table  table-bordered border-Secondary ">
                    <thead class="table-dark">

                                <tr>
                                    <th>Fecha</th>
                                    <th>Tipo de gasto</th>
                                    <th>Gastos</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    @foreach($egresos as $item2) 
                                    <tr class="bg-danger bg-opacity-50">
                                        <td>{{ $item2->fecha }}</td>
                                        <td>{{ $item2->tipo }}</td>
                                        <td>$ {{ number_format($item2->gesEgresos )}}</td> 
                                    </tr>
                                    @endforeach
                                </tr>
                        </tbody>
                </table>
                {{ $egresos->links() }}
            </div>
        </div>
    </div>
    <br>
        <table>  
            <tr>
                <td>El total de ganancias: <b class="text-success">${{ number_format($total) }}</b></td>
            </tr>
            <tr>
                <td>El total de gastos:<b class="text-danger">${{ number_format($total2) }}</b></td>
            </tr>
            @if ($total3 > 0)
                <tr>
                    <td>El total de ganancias: $<b class="text-success">{{ number_format($total3) }}</b></td>
                </tr> 
                
                
            @else
            <tr>
                <td>El total de ganancias: <b class="text-danger">${{ number_format($total3) }}</b></td>
            </tr> 
                        
            @endif
        </table>
                
        @else
            <p>No se a registrado movimiento en la tienda. </p>
        @endif
    @endcan

    @can('usuario')
    <p class="fs-4 ms-4 fa-fade">  <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>No tienes permiso para estas funciones <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>
        <a href="{{ route('clientes.index') }}" id="myTooltip" class="btn btn-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
    </p>       
    @endcan
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