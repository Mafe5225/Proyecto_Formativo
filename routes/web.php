<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EgresosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\GananciasController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('inicio');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('inicio', function () {
    return view('welcome');
})->middleware(['auth']);

Route::resource('ventas', VentasController::class)->middleware('auth');
Route::resource('egresos', EgresosController::class)->middleware('auth');
Route::resource('clientes', ClientesController::class)->middleware('auth');
Route::resource('ganancias', GananciasController::class)->middleware('auth');
Route::resource('movimientos', MovimientosController::class)->middleware('auth');




