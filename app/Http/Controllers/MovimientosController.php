<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Movimientos;
use App\Models\Clientes;
use Gate;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimientos::all();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movimientos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valor = $request->valor;

        Movimientos::create($request->all());
        return redirect()->route('clientes.show')->with('exitoCredito', '¡El crédito se ha Inicializado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function show(Movimientos $movimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimientos $movimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movimientos = Movimientos::findOrFail($id);

        $movimientos->update($request->all());
        return redirect()->route('clientes.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movimientos = Movimientos::findOrFail($id);
        $movimientos->delete();
        return redirect()->route('clientes.index');
    }
}
