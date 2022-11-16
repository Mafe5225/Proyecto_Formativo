@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
    @if(count($egresos)>0 or count($ventas)>0)  
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Venta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $item)
                        <tr>
                            <td>{{ $item->fecha }}</td>
                            <td>{{ $item->gesVentas }}</td>    
                        </tr>
                        <table><tr>
                            <td>El total de ventas: $<b>{{ $total->total }}</b></td>
                        </tr>
                        <tr>
                            <td>El total de gastos: $<b>{{ $total2->total2 }}</b></td>
                        </tr>
                        {{-- <tr>
                            <td>El total de gastos: $<b>{{ $total3 }}</b></td>
                        </tr> --}}
                    </table>
                        
                        {{-- <tr>
                            <td>El total de ganacias: $<b>{{ $total->total }}</b></td>
                        </tr> --}}
                    @endforeach
                </tbody>
        </table>
    @else
        <p>El registro de ventas esta vacía.</p>
    @endif
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