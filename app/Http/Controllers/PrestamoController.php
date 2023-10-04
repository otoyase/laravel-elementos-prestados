<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Models\Prestamo;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestamoController extends Controller
{
    public function index(){

       $prestamos = DB::table('prestamos')
        ->leftJoin('users as prestatarios', 'prestatarios.id', '=', 'prestamos.prestatario_id')
        ->leftJoin('users as prestamistas', 'prestamistas.id', '=', 'prestamos.prestamista_id')
        ->leftJoin('elementos', 'elementos.id', '=', 'prestamos.elemento_prestado_id')
        ->leftJoin('tipo_elementos', 'tipo_elementos.id', '=', 'elementos.tipo_elemento_id')
        ->leftJoin('estados', 'estados.id', '=', 'prestamos.estado_id')
        ->select(['prestamos.*', 'prestatarios.nombres as prestatario', 'prestamistas.nombres as prestamista', 'elementos.numero_serie as numero_serie_elemento', 'tipo_elementos.tipo_elemento as elemento_prestado', 'estados.estado as estado'])
        ->get();

        // dd($prestamos);

       return view('prestamo.index', compact('prestamos'));

    }

    public function crearPrestamo() {

        $prestatarios = User::where('tipo_usuario_id', 1)->get();
        $prestamistas = User::where('tipo_usuario_id', 2)->get();
        $elementos_disponibles = DB::table('elementos')
        ->where('estado_id', 2)
        ->leftJoin('tipo_elementos', 'elementos.tipo_elemento_id', '=' , 'tipo_elementos.id')
        ->leftJoin('estados', 'elementos.estado_id', '=' , 'estados.id')
        ->select('elementos.*', 'tipo_elementos.tipo_elemento', 'estados.estado', DB::raw("CONCAT(tipo_elementos.tipo_elemento,' - ',elementos.numero_serie) AS elemento_disponible"))
        ->get();

        // dd($elementos_disponibles);

        return view('prestamo.crear', compact('prestatarios', 'prestamistas', 'elementos_disponibles'));

    }

    public function guardarPrestamo(Request $request){

        $elemento = Elemento::find($request->elemento_disponible);

        $elemento->estado_id = 1;

        $elemento->save();

        $prestamo = Prestamo::create([

            'prestatario_id' => $request->prestatario,
            'prestamista_id' => $request->prestamista,
            'elemento_prestado_id' => $request->elemento_disponible,
            'fecha_hora_prestamo' => Carbon::now(),
            'estado_id' => 3,

        ]);

        return redirect('/prestamos');

    }

    public function finalizarPrestamo (string $id) {

        $prestamo = Prestamo::find($id);

        $prestamo->estado_id = 4;

        $prestamo->fecha_hora_devolucion = Carbon::now();

        $prestamo->save();

        $elemento_prestado = Elemento::find($prestamo->elemento_prestado_id);

        $elemento_prestado->estado_id = 2;

        $elemento_prestado->save(); 

        return redirect('/prestamos');

    }
}
