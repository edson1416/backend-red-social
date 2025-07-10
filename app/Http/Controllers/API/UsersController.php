<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function index(){
        $usuario = User::with('amigos.amigo')->find(1);
        return response()->json(['data' => $usuario]);
    }

    public function desconectar(Request $request){
        $usuario = User::find($request->user()->id);
        $usuario->conectado = false;
        $usuario->fecha_ultima_conexion = date('Y-m-d H:i:s');
        $usuario->save();
    }
}

