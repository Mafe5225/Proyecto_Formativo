@extends('layouts.main')
@section('titulo','Registra la venta')

@section('content')
@can('administrador')

    
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





