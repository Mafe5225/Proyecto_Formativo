@extends('layouts.main')

@section('titulo', ' Nuevo cliente')

@section('content')
<form action="{{ route('clientes.store') }}" method="post" class="needs-validation" novalidate>
    @csrf
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
      <label for="nombre">Nombre</label>
    </div>
    <div class="form-floating mb-3">
      <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" minlength="0" maxlength="10" required>
      <label for="telefono">Teléfono</label>
    </div>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" required>
      <label for="direccion">Direccion</label>
    </div>


    <button type="submit" class="btn btn-secondary">Guardar</button>
  <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
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