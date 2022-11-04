<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/logoTienda.png') }}">
</head>
<body>
    
</body>
</html>

@extends('layouts.main')

@section('titulo','Registro de ventas')

@section('content')

    @can('administrador')
        <div class="mt-3">
            <a href="{{ route('ventas.create') }}" class="btn btn-secondary">
                Registrar nueva venta
            </a>
        </div>
    @endcan

    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="my-3">
        @if(count($ventas) > 0)

            @if ($query)
                <div class="alert alert-info" role="alert">
                    <p>A continuación se presentan los resultados de la búsqueda <span class="fw-bold">{{ $query }}</span></p>
                </div>
            @endif

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Valor</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventas as $item)
                        <tr>
                            <td>{{ $item->fecha}}</td>
                            <td>${{ $item->ventas }}</td>
                            <td class="d-flex">
                                <a href="{{ route('ventas.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                                @can('administrador')
                                    <a href="{{ route('ventas.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{ route('ventas.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger rounded-circle">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody> 
            </table> 

            {{ $ventas->links() }}

        @else
            <p>La búsqueda no arrojó resultados.</p>
        @endif
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        //Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e){
            // Para el lanzamiento del evento
            e.preventDefault();
            //Lanzar alerta de sweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el registro del cliente?',
                text: "¡Esta acción no se podrá deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#dc4545',
                confirmButtonText: 'Sí, eliminar!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>
@endsection