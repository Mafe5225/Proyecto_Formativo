@extends('layouts.ganancias')
    @section('titulo', 'Gastos')
        @section('content')

        
            @if ($mensaje = Session::get('exito'))
                <div class="alert alert-success alert-dismissible fade show  position-fixed bottom-0 end-0 mx-4" role="alert" >
                    <p id="MensajeExi">{{ $mensaje }}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col">
                    <form action="{{ route('egresos.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                    
                        <div class="form-floating mb-3">
                            <input type="double" class="form-control" id="gesEgresos" name="gesEgresos" placeholder="Egreso a registrar" required>
                            <label for="gesEgresos">Gasto a registrar</label>
                        </div>
                       
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la egreso"  value="<?php echo date("Y-n-j"); ?>" required>
                            <label for="fecha">Fecha del gasto</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="double" class="form-control" id="tipo" name="tipo" placeholder="Tipo de egresos" required>
                            <label for="tipo">Tipo de gasto</label>
                        </div>
                        <button type="submit" class="btn btn-outline-success">Guardar</button>
                    </form>
                </div>
                <div class="col">

                    @if(count($egresos)>0)
               
                        <div class="form-floating mb-3">
                            <table class="table  border-dark ">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Gastos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($egresos as $item)
                                        <tr>
                                            <td>{{ $item->fecha }}</td>
                                            <td>{{ $item->tipo }}</td>
                                            <td>${{ number_format($item->gesEgresos) }}</td>    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
               
                        {{ $egresos->links() }}
        
                    @else
                        <p> No hay resultados.</p>
                    @endif
                </div>
            </div>
    
            @can('usuario')
                <p class="fs-4 ms-4 fa-fade">  <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>No tienes permiso para estas funciones <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>
                    <a href="{{ route('clientes.index') }}" id="myTooltip" class="btn btn-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
                </p>
            @endcan
    @endsection