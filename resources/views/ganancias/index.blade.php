@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
@can('administrador')
    @if(count($egresos)>0 or count($ventas)>0)  
        
    <div class="row ">
        <a href="{{ route('clientes.index') }}" ></a>
        <div class="col overflow-scroll" id="scroll">
            {{-- <h3 class="text-center">Ventas</h3> --}}
            <div class="form-floating mb-3">
                <table class="table table-bordered border-Secondary ">
                    <thead class="table-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Venta</th>
                            </tr>
                    </thead>
                    <tbody>
                            <tr>
                                @foreach($ventas as $item) 
                                <tr class="bg-success bg-opacity-50">
                                    <td>{{ $item->fecha }}</td>
                                    <td>${{ $item->gesVentas }}</td> 
                                </tr>
                                @endforeach
                            </tr>
                    </tbody>
                </table> 
            </div>
        </div>



        <div class="col overflow-scroll" id="scroll">
            <div class="form-floating mb-3">
                <table class="table  table-bordered border-Secondary ">
                    <thead class="table-dark">
                        {{-- <h3 class="text-center">Gastos</h3> --}}
                                <tr>
                                    <th>Fecha</th>
                                    <th>Tipo de gasto</th>
                                    <th>Gasto</th>
                                </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    @foreach($egresos as $item2) 
                                    <tr class="bg-danger bg-opacity-50">
                                        <td>{{ $item2->fecha }}</td>
                                        <td>{{ $item2->tipo }}</td>
                                        <td>$ -{{ $item2->gesEgresos }}</td> 
                                    </tr>
                                    @endforeach
                                </tr>
                        </tbody>
                </table> 
            </div>
        </div>
    </div>
    <br>
        <table>  
            <tr>
                <td>El total de ganancias: <b class="text-success">${{ $total }}</b></td>
            </tr>
            <tr>
                <td>El total de gastos:<b class="text-danger">$-{{ $total2 }}</b></td>
            </tr>
            @if ($total3 > 0)
                <tr>
                    <td>El total de ganancias: $<b class="text-success">{{ $total3 }}</b></td>
                </tr> 
                
                
            @else
            <tr>
                <td>El total de ganancias: <b class="text-danger">${{ $total3 }}</b></td>
            </tr> 
                        
            @endif
        </table>
                
        @else
            <p>No se a registrado movimiento en la tienda. </p>
        @endif
    @endcan

    @can('usuario')
    <p>No tienes permiso para estas funciones (⌣̀_⌣́)</p>        
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