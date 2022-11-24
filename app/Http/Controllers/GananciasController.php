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
        
        if($request)
        {
            $total=0;
            $total2=0;
            $total3=0;
            
            $sumVentas = Ventas::where('deleted_at', null)
            ->orderBy('fecha', 'asc')
            ->get();
            
            
            $sumEgresos= Egresos::where('deleted_at', null)
            ->orderBy('fecha', 'asc')
            ->get();
            
            $query = $request->buscar1;
            $ventas = Ventas::where('fecha', 'LIKE', '%' . $query . '%')
            ->orderBy('fecha', 'desc')
            ->paginate(5);
            $egresos = Egresos::where('fecha', 'LIKE', '%' . $query . '%')
            ->orderBy('fecha', 'desc')
            ->paginate(5);
            
            foreach($sumVentas as $item)
            {
                $total+= $item->gesVentas;
            }
            foreach($sumEgresos as $item)
            {
                $total2+= $item->gesEgresos;
            }
            $total3= $total - $total2;
            
            
            return view('ganancias.index', compact('ventas','egresos','total','total2','total3', 'query'));
            
      
        }



        //  Obtener todos los registros
         
        $total=0;
        $total2=0;
        $total3=0;
        
        $ventas = Ventas::where('deleted_at', null)
        ->orderBy('fecha', 'asc')
        ->get();
        
        
        $egresos = Egresos::where('deleted_at', null)
        ->orderBy('fecha', 'asc')
        ->get();
        
        foreach($ventas as $item)
        {
            $total+= $item->gesVentas;
        }
        foreach($egresos as $item)
        {
            $total2+= $item->gesEgresos;
        }
        $total3= $total - $total2;
         
        // enviar a la vista
        return view('ganancias.index', compact('ventas','egresos','total', 'total2', 'total3'));

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
?>