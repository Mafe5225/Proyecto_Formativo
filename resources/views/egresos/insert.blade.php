@extends('layouts.main')
@section('titulo', 'Registra el gasto')
@section('content')
@can('administrador')
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
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
  </form>
    
@endcan
@can('usuario')
           
<p>No tienes permiso para estas funciones (⌣̀_⌣́)</p>
@endcan

@endsection

@section('scripts')
<script>
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

