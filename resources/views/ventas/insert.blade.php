@extends('layouts.main')
@section('titulo','Registra la venta')

@section('content')
<form action="{{ route('ventas.store') }}" method="post" class="needs-validation" novalidate>
  @csrf
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de venta" required>
    <label for="tipo">Tipo de venta</label>
  </div>
  <div class="form-floating mb-3">
    <input type="number" class="form-control" id="ventas" name="ventas" placeholder="Total a pagar" required>
    <label for="ventas">Total a pagar</label>
          </div>
     
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la venta"  value="<?php echo date("Y-n-j"); ?>"required>
            <label for="fecha">Fecha de la venta</label>
          </div>
      <button type="submit" class="btn btn-secondary">Guardar</button>
      <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
    </form>
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





{{-- <form action="{{ route('ventas.store') }}" method="post" class="needs-validation" novalidate>
  
  <div class="form-floating mb-3">
    <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo" required>
    <label for="tipo" class="form-label">tipo de venta</label>
    <div class="valid-feedback"> tipo de venta
        </div>
      </div>
      <div class="form-floating mb-3">
        <input type="text" class="form-control" id="ventas" name="ventas" placeholder="Venta" required>
        <label for="ventas" class="form-label">Total a pagar</label>
        <div class="valid-feedback"> Total a pagar
        </div>

      </div>
      <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="fecha"  required>
        <label for="fecha" class="form-label">fecha</label>
        <div class="valid-feedback"> fecha
        </div>
      </div>


      
      <button type="submit" class="btn btn-success">Confirmar</button>
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

@endsection --}}