@extends('layouts.main')
@section('titulo', 'Registra el egreso')
@section('content')
<form action="{{ route('egresos.store') }}" method="post" class="needs-validation" novalidate>
    @csrf
    
    <div class="form-floating mb-3">
      <input type="double" class="form-control" id="gesEgresos" name="gesEgresos" placeholder="Egreso a registrar" required>
      <label for="gesEgresos">Egreso a registrar</label>
    </div>
       
    <div class="form-floating mb-3">
        <input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha de la egreso"  value="<?php echo date("Y-n-j"); ?>"required>
        <label for="fecha">Fecha del egreso</label>
    </div>
    <div class="form-floating mb-3">
        <input type="double" class="form-control" id="tipo" name="tipo" placeholder="Tipo de egresos" required>
        <label for="tipo">Tipo de egresos</label>
    </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('ventas.index') }}" class="btn btn-danger">Cancelar</a>
  </form>
@endsection
