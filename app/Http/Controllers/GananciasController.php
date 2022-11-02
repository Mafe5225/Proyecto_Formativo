<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Ganancias;
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
        // $ganancias = $request->ventas;  DB::table('ventas')->sum('ventas');
        
        // $ganancias = $request->ventas;
       
        // $ganancias  = ventas::orderBy('fecha', 'asc')
        // ->paginate(5);
        $ventas = Ventas::orderBy('id', 'asc')
        ->paginate(5);
        return view('ganancias.index', compact('ventas') );

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ganancias  $ganancias
     * @return \Illuminate\Http\Response
     */
    public function show(Ganancias $ganancias, $id)
    {
        $total = DB::table('ventas')->sum('ventas');
        return view('ganancias.show', compact('total'));
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
    public function destroy(Ganancias $ganancias)
    {
        //
    }
}
