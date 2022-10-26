@extends('layouts.main')

@section('titulo','Modificacion de ventas')
@section('content')
  <form action="{{ route('ventas.update', $ventas->id) }}" method="post" class="needs-validation" novalidate>
      @csrf
      @method('PUT')
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="venta" name="venta" placeholder="Venta" value="{{ $ventas->ventas }}" required>
        <label for="venta">Total venta</label>
      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha" value="{{ $ventas->fecha }}" required>
        <label for="fecha">fecha</label>
      </div>



      <button type="submit" class="btn btn-secondary">Guardar</button>
    <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
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
