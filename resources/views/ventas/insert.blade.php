@extends('layouts.main')
@section('titulo','Registra la venta')

@section('content')
@can('administrador')

    
@endcan
@can('usuario')
           
<p class="fs-4 ms-4 fa-fade">  <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>No tienes permiso para estas funciones <i class="fa-solid text-danger fa-triangle-exclamation fa-fade"></i>
  <a href="{{ route('clientes.index') }}" id="myTooltip" class="btn btn-warning  me-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top"><i class="fa-solid fa-left-long"></i></a>
</p>
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





