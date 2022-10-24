@extends('layouts.main')

@section('titulo', 'Clientes')

@section('content')


    <div class="mt-3">
        <a href="{{ route('clientes.create') }}" class="btn btn-secondary">
            Registrar nuevo cliente
        </a>
    </div>
    <div class="my-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                    <th>Acciones para el credito</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td class="d-flex">
                            <a href="{{ route('clientes.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('clientes.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="{{ route('clientes.destroy', $item->id) }}" method="post" class="justify-content-start form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-circle">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </td>
                            <td>
                                
                                <a href="#" class="btn btn-outline-success justify-content-start me-1 rounded-circle"> <i class="fa-solid fa-dollar-sign"></i></a>
                                <a href="#" class="btn btn-outline-info justify-content-start me-1 rounded-circle" > <i class="fa-solid fa-eye"></i></a>
                                <a href="#"  class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                  
                                <form action="#" method="post" class="justify-content-start form-delete">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger rounded-circle">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    {{-- {{ route('clientes.destroy', $item->id) }} --}}
                            </td>
                            </form>
                    </tr>
                @endforeach
            </tbody> 
        </table> 
        
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        //Captura del evento submit del formulario para eliminar
        $('.form-delete').submit(function(e){
            // Para el lanzamiento del evento
            e.preventDefault();
            //Lanzar alerta de sweetAlert
            Swal.fire({
                title: '¿Está seguro de eliminar el proyecto?',
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