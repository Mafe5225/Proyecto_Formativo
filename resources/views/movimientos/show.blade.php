<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crédito || Tienda Bella Vista</title>
    <link rel="shortcut icon" href="{{ asset('images/logoTienda.png') }}">
</head>
<body>

</body>
</html>

@extends('layouts.main')

@section('content')
    @if ($mensaje = Session::get('exitoCredito'))
        <div class="alert alert-success alert-dismissible fade show " role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Historial --}}

    <div class="col-sm-6">
        <div class="position-absolute top-50 start-50 translate-middle" id="historial">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Historial de {{$clientes->nombre}}</h3>
                </div>
                <div class="card-body">

                    {{-- Input que muestra la deuda del cliente --}}
                   <h4>$ {{$total}}</h4> 

                    <div class="overflow-scroll">
                        @if(count($movimientos) > 0)
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($movimientos as $item)    
                                        @if($item->tipoMovimiento == 'deuda')    
                                            <tr class="deuColor">
                                                <td>{{ $item->fecha }}</td>
                                                <td>{{$item->valor}}</td>
                                            </tr>
                                        @else
                                            <tr class="aboColor">
                                                <td>{{ $item->fecha }}</td>
                                                <td>{{$item->valor}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No hay historial ;3</p>
                        @endif
                    </div>
        

                    <form action="{{ route('movimientos.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <input type="hidden" name="cliente_id" value="{{$clientes->id}}">
                        <div class="input-group mb-3 mt-1">
                            <label class="input-group-text" for="valor">$</label>
                            <input type="number" class="form-control" id="valor" name="valor" minlength="0" maxlength="6" required>
                        </div>

                        <div class="form-check position-absolute ms-2">
                            <input class="form-check-input" type="radio" name="tipoMovimiento" id="deuda" value="deuda" checked>
                            <label class="form-check-label" for="deuda">
                              Deuda
                            </label>
                        </div>
                        <div class="form-check position-absolute top-5 end-50" id="Abo">
                            <input class="form-check-input" type="radio" name="tipoMovimiento" id="abono" value="abono">
                            <label class="form-check-label" for="abono">
                              Abono
                            </label>
                        </div>

                        <button type="submit" class="btn btn-outline-success mt-5" id="btnGuardar">Guardar</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-danger position-absolute end-50" id="btnVolver">Volver</a>
                    </form>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div>

    </div>


@endsection


@section('script')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
    'use strict'

     // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
             event.preventDefault()
             event.stopPropagation()
         }

        form.classList.add('was-validated')
        }, false)
    })
    })()
    </script>

@endsection