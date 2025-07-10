<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\MisChats;
use Illuminate\Http\Request;

class MisChatsController extends Controller
{
    public function misChats(Request $request){
        $chats = MisChats::with([
            'chats.miembros' => function ($query) {
            $query->select('id','user_id','chat_id');
        },
            'chats.miembros.user' => function ($query) {
                $query->select('id','name','email','conectado','fecha_ultima_conexion');
            }
        ])->where('user_id',$request->user()->id)->get();

        return response()->json(['mis_chats'=>$chats]);
    }
}
