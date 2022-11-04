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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                
                    {{--Input que muestra la deuda del cliente 
                    <input type="text" value="{{$total}}" disabled> --}}

                    <div class="overflow-scroll">
                        <p class="border border-dark mb-1">
                            <input type="text" class="mt-1 mb-1" disabled>
                        </p>
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

                        <button type="submit" class="btn btn-outline-danger mt-5" id="btnGuardar">Guardar</button>
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