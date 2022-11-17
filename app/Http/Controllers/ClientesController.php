<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movimientos;
use App\Models\Clientes;
use Gate;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request)
        {
            $query = $request->buscar;
            
            $clientes = Clientes::where('cedula', 'LIKE', '%' . $query . '%')
                                    ->orderBy('nombre', 'asc')
                                    ->paginate(5);
            
            // 
            return view('clientes.index', compact('clientes', 'query'));
        }
         // Obtener todos los registros
         $clientes = Clientes::orderBy('nombre', 'asc')
         ->paginate(5);

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
        $cedula = $request->cedula;
        $telefono = $request->telefono;
        $direccion = $request->direccion;

        Clientes::create($request->all());
        return redirect()->route('clientes.index')->with('exito', '¡El registro del crédito se ha creado satisfactoriamente!');

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
    public function update(Request $request, Clientes $clientes, $id)
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
