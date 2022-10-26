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
                    <th>fecha</th>
                    <th>Valor</th>
                    <th>Acciones</th>
                 
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->fecha}}</td>
                        <td>${{ $item->ventas }}</td>
                        <td class="d-flex">
                            <a href="{{ route('ventas.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('ventas.edit', $item->id) }}" class="btn btn-outline-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form action="#" method="post" class="justify-content-start form-delete">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger rounded-circle">
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