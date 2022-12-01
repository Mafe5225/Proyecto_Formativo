<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Egresos;
use Gate;

class EgresosController extends Controller
{
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
            $egresos = Egresos::where('fecha', 'LIKE', $query)
                                    ->orderBy('fecha', 'desc')
                                    ->paginate(5);
            // 
            return view('egresos.index', compact('egresos', 'query'));
        }
        $egresos = Egresos::orderBy('fecha', 'asc')
        ->paginate(5);

        return view('egresos.index', compact('egresos'));
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
            return redirect()->route('egresos.index');
        }
        return view('egresos.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Egresos::create($request->all());
        return redirect()->route('egresos.index')->with('exito', '¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function show(Egresos $egresos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function edit(Egresos $egresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Egresos $egresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Egresos  $egresos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Egresos $egresos)
    {
        //
    }
}
