<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $usuario = User::with('amigos.amigo')->find(1);
        return response()->json(['data' => $usuario]);
    }
}
