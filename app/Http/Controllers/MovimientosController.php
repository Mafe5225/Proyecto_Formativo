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
        $movimiento = Movimientos::all();
        return view('clientes.show', compact('movimiento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.show');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Movimientos::create($request->all());
        return redirect()->route('movimientos.show', $request->cliente_id)->with('exitoCredito', '¡El crédito se ha registrado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimientos  $movimientos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clientes = Clientes::findOrFail($id);
        $movimientos = Movimientos::where('cliente_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();
        $total = 0;

        foreach($movimientos as $item)
        {
            if($item->tipoMovimiento == 'deuda')
            {
                $total -= $item->valor;
            }
            else
                $total += $item->valor;
        }
        return view('movimientos.show', compact('clientes', 'movimientos', 'total'));
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
