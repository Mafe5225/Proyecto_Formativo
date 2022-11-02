@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
<table class="table table-hover">
    <tbody>  
        
        
        {{-- @foreach ( $ganancias  as $item)
            <td>{{ $item->gesVentas }}</td>    
        @endforeach --}}
       @foreach ($ventas as $item)
       <td>{{ $item->gesVentas }}</td>
       <td>  <a href="{{ route('ganancias.show', $item->id) }}" class="btn btn-outline-info justify-content-start me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Visualisar"><i class="fa-solid fa-eye"></i></a></td>

       @endforeach

    </tbody>
            
</table>

@endsection