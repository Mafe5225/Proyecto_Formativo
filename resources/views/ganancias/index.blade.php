@extends('layouts.main')
@section('titulo', 'Total de ganancias')
@section('content')
{{-- <table class="table table-hover">
    <tbody>
        @foreach ($ganancias as $item)
        
        <td>ff{{ $item->ventas }}</td>
        <h2>2222</h2>
        
        @endforeach
    </tbody>
</table> --}}
<?php 
return DB::table('ventas')->sum('ventas');?>
@endsection