<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\Ventas;
use App\Models\user;
use Gate;
class VentasController extends Controller
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
            $query = $request->buscar1;
            $ventas = Ventas::where('fecha', 'LIKE', $query )
                                    ->orderBy('fecha', 'desc')
                                    ->paginate(5);
            // 
            return view('ventas.index', compact('ventas', 'query'));
        }
         // Obtener todos los registros
         
         $ventas = Ventas::orderBy('fecha', 'desc')
         ->paginate(5);

        // enviar a la vista
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('administrador'))
        {
            // abort(403);
            return redirect()->route('ventas.index');
        }
        return view('ventas.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        Ventas::create($request->all());
        return redirect()->route('ventas.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ventas = Ventas::findOrFail($id);
        return view('ventas.show', compact('ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ventas = Ventas::findOrFail($id);
        return view('ventas.edit', compact('ventas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $ventas = Ventas::findOrFail($id);

        $ventas->update($request->all());
        return redirect()->route('ventas.index')->with('exito', '¡El registro se ha actualizado satisfactoriamente!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ventas = Ventas::findOrFail($id);
        $ventas->delete();
        return redirect()->route('ventas.index');
    }
}
