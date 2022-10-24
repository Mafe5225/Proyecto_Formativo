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
                    <th>Nombre</th>
                    <th>Acciones</th>
                    <th>Acciones para el credito</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td class="d-flex">
                            <a href="#" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                            <a href="#" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="#" method="post" class="justify-content-start form-delete">
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
                                   
                            </td>
                            </form>
                    </tr>
                @endforeach
            </tbody> 
        </table> 
        
    </div>
    
@endsection