<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ganancias || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
    @if(count($egresos)>0 or count($ventas)>0)  
    <div class="bg-transparent">
        <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Venta</th>
                    
                    @foreach($ventas as $item)
                        
                            <td>{{ $item->fecha }}</td>
                            <td>{{ $item->gesVentas }}</td> 
                            @endforeach
                    </tr>
                   
                    <tr>
                        <th>Fecha</th>
                        <th>Venta</th>
                    </tr>
                    @foreach($egresos as $item2)
    
                        <tr>
                            <td>{{ $item2->fecha }}</td>
                            <td>{{ $item2->gesEgresos }}</td>    
                        </tr>   
                </thead>
                
                <tbody>
                            
                    @endforeach
                    
            
                </tbody>
        </table>
    </div>
       
            
            
        
            <td>El total de ventas: $<b>{{ $total }}</b></td>
        </tr>
        <tr>
            <td>El total de gastos: $<b>{{ $total2 }}</b></td>
        </tr>
        <tr>
            <td>El total de ganancias: $<b>{{ $total3 }}</b></td>
        </tr>
                                
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