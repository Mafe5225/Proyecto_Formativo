@extends('layouts.main')
@section('titulo','Registro de venta')
    @section('content')
    <div class="mt-3">
        <a href="{{ route('ventas.create') }}" class="btn btn-secondary">
            Registrar nuevo cliente
        </a>
    </div>
    <div class="my-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>tipo</th>
                    <th>fecha</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->tipo }}</td>
                        <td>{{ $item->fecha}}</td>
                        <td>${{ $item->ventas }}</td>
                        <td class="d-flex">
                            <a href="{{ route('ventas.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('ventas.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('ventas.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-circle">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            </td>
                           
                    </tr>
                @endforeach
            </tbody> 
        </table> 
        
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