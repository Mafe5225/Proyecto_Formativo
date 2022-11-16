<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Ganancias;
use App\Models\Egresos;
use Illuminate\Http\Request;
use App\Models\Ventas;


class GananciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $ventas = Ventas::orderBy('fecha', 'asc')
         ->paginate(5);
        $total = DB::table('ventas')
        ->select(DB::raw('sum(gesVentas) as "total" '))
        ->whereNull('deleted_at')
        ->first();

        $egresos = Egresos::orderBy('fecha', 'asc')
        ->paginate(5);
       $total2 = DB::table('egresos')
       ->select(DB::raw('sum(gesEgresos) as "total2" '))
       ->whereNull('deleted_at')
       ->first();
      
       $total3 =(double)$total - $total2;
        
        return view('ganancias.index', compact('ventas','egresos','total', 'total2','total3'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return redirect()->route('proyectos.index',$request->ventas_id)->with('exito', '¡El registro se ha creado satisfactoriamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganancias  $ganancias
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ganancias  $ganancias
     * @return \Illuminate\Http\Response
     */
    public function edit(Ganancias $ganancias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ganancias  $ganancias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ganancias $ganancias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ganancias  $ganancias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
     
       
    }
}
