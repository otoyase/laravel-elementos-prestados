<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\TipoUsuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {

        $usuarios = DB::table('users')
            ->leftJoin('tipo_usuarios', 'tipo_usuarios.id', '=', 'users.tipo_usuario_id')
            ->select(['users.*', 'tipo_usuarios.tipo_usuario as tipo_usuario'])
            ->get();

        return view('usuario.index', compact('usuarios'));
    }

    public function crearUsuario()
    {

        $tipos_usuarios = TipoUsuario::all();

        return view('usuario.crear', compact('tipos_usuarios'));
    }

    public function guardarUsuario(Request $request)
    {

        User::create([

            'nombres' => $request->nombres,
            'numero_documento' => $request->nombres,
            'tipo_usuario_id' => $request->tipo_usuario,
            'email' => $request->email,
            'password' => 'null'

        ]);

        return redirect('/usuarios');
    }

    public function verPrestamosUsuario($id)
    {

        $usuario = User::find($id);
        $prestamos = DB::table('prestamos')
        ->where('prestatario_id', $id)
        ->leftJoin('users as prestamistas', 'prestamistas.id', '=', 'prestamos.prestamista_id')
        ->leftJoin('elementos', 'elementos.id', '=', 'prestamos.elemento_prestado_id')
        ->leftJoin('tipo_elementos', 'tipo_elementos.id', '=', 'elementos.tipo_elemento_id')
        ->leftJoin('estados', 'estados.id', '=', 'prestamos.estado_id')
        ->select(['prestamos.*', 'prestamistas.nombres as prestamista', 'elementos.numero_serie as numero_serie_elemento', 'tipo_elementos.tipo_elemento as elemento_prestado', 'estados.estado as estado'])
        ->get();
       
        return view('usuario.prestamos', compact('usuario', 'prestamos'));
    }
}
