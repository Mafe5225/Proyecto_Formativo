<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rol;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();

        // enviar a la vista
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $clientes = new Clientes;
        return view('clientes.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      
        $nombre = $request->nombre;
        $telefono = $request->telefono;
        $direccion = $request->direccion;

        Clientes::create($request->all());
        return redirect()->route('clientes.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::findOrFail($id);
        return view('clientes.show', compact('clientes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clientes = Clientes::findOrFail($id);
        return view('clientes.edit', compact('clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = Clientes::findOrFail($id);

        $clientes->update($request->all());
        return redirect()->route('clientes.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Clientes::findOrFail($id);
        $clientes->delete();
        return redirect()->route('clientes.index');
    }
}
