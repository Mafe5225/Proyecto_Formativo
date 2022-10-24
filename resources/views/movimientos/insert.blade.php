@extends('layouts.main')

@section('titulo', 'Inicializar el crédito')

@section('content')
<form action="{{ route('movimientos.store') }}" method="post" class="needs-validation" novalidate>
    @csrf
    <div class="form-floating mb-3">
      <input type="double" class="form-control" id="valor" name="valor" placeholder="$" required>
      <label for="valor">Valor a fiar</label>
    </div>
    

    <button type="submit" class="btn btn-secondary">Guardar</button>
  <a href="{{ route('clientes.show') }}" class="btn btn-danger">Cancelar</a>
</form>

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