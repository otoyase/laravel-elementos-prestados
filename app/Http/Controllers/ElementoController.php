<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\TipoElemento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementoController extends Controller
{
    public function index()
    {

        $elementos = DB::table('elementos')
        ->leftJoin('tipo_elementos', 'tipo_elementos.id', '=', 'elementos.tipo_elemento_id')
        ->leftJoin('estados', 'estados.id', '=', 'elementos.estado_id')
        ->select(['elementos.*', 'tipo_elementos.tipo_elemento as tipo_elemento', 'estados.estado as estado'])
        ->get();

        return view('elemento.index', compact('elementos'));
    }


    public function crearElemento()
    {

        $tipos_elementos = TipoElemento::all();

        return view('elemento.crear', compact('tipos_elementos'));
        
    }

    public function guardarElemento(Request $request){

        // dd($request->all());

        $elemento = Elemento::create([

            'tipo_elemento_id' => $request->tipo_elemento,
            'numero_serie' => $request->numero_serie,
            'observaciones' => $request->observaciones,
            'estado_id' => 2,

        ]);

        return redirect('/elementos');

    }

   
}
