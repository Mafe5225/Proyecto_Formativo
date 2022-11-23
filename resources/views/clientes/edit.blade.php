@extends('layouts.main')

@section('titulo', 'Editar información del cliente')

@section('content')
    <form action="{{ route('clientes.update', $clientes->id) }}" method="post" class="needs-validation"  novalidate>
        @method('PUT')
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ $clientes->nombre}}" required>
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" minlength="0" maxlength="10"  value="{{ $clientes->telefono }}"  required>
            <label for="telefono">Teléfono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="{{ $clientes->direccion}}" required>
            <label for="direccion">Direccion</label>
          </div>


        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
@endsection

@section('scripts')
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