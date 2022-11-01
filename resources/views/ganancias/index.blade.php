@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
<table class="table table-hover">
    <tbody>
        
        @foreach ($gananciasTotal as $item)
        <tr>
            <td>{{ $item->gananciasTotal }}</td>
                <td class="d-flex">            
                    <a href="{{ route('usuarios.edit', $item->id) }}" class="btn btn-warning justify-content-start me-1 rounded-circle"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                    </td>
                </tr>
            </table>
    @endforeach
        
    </tbody>
</table>

@endsection