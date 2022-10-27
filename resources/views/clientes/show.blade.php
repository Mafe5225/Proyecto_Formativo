@extends('layouts.mainCliente')

@section('content')
    @if ($mensaje = Session::get('exitoCredito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Historial --}}

    <div class="col-sm-6">
        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Historial</h3>
                </div>
                <div class="card-body">
                
                    <h4 class="card-title">$ 50000</h4>

                    <div class="overflow-scroll">
                        <p class="border border-dark mb-1">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, asperiores cum impedit, veritatis mollitia quis quos earum corporis ab eligendi voluptatibus aliquid rem, voluptatem id culpa nostrum error vitae. Blanditiis!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, asperiores cum impedit, veritatis mollitia quis quos earum corporis ab eligendi voluptatibus aliquid rem, voluptatem id culpa nostrum error vitae. Blanditiis!
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, asperiores cum impedit, veritatis mollitia quis quos earum corporis ab eligendi voluptatibus aliquid rem, voluptatem id culpa nostrum error vitae. Blanditiis!
                        </p>
                    </div>
                    
                    <form action="{{ route('movimientos.store') }}" method="post" class="needs-validation" novalidate>
                        @csrf
                        <div class="input-group mb-3 mt-1">
                            <label class="input-group-text" for="valor">$</label>
                            <input type="number" class="form-control" id="valor" name="valor" minlength="0" maxlength="6" required>
                        </div>

                        <button type="submit" class="btn btn-outline-danger">Deuda</button>
                        <button type="submit" class="btn btn-outline-success">Abono</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">Volver</a>
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