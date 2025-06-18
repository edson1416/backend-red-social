<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudAmistadRequest;
use App\Models\Amigos;
use App\Models\SolicitudesAmistad;
use App\Models\SolicitudesUsuarios;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SolicitudesAmistadController extends Controller
{

    function enviarSolicitud(Request $request){
        $validator = Validator::make($request->all(), [
            //usuario al que va dirigida la solicitud
            'id_usuario_solicitud' => 'required|integer|exists:users,id',
        ],[
            'id_usuario_solicitud.integer' => 'El id del usuario debe ser entero.',
            'id_usuario_solicitud.exists' => 'El id del usuario no existe.',
            'id_usuario_solicitud.required' => 'El id del usuario es requerido.',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }else{
            $solicitud = SolicitudesAmistad::create([
                'id_usuario' => $request->user()->id,   //persona que envia solicitud
                'id_estado_solicitud' => 1
            ]);

            SolicitudesUsuarios::create([
                'id_usuario' => $request->id_usuario_solicitud,
                'id_solicitud' => $solicitud->id
            ]);

            return response()->json(['message' => 'Solicitud enviada'], 200);
        }
    }

    function resolverSolicitud(Request $request){
        $validator = Validator::make($request->all(), [
            'id_solicitud' => 'required|integer|exists:solicitudes_amistad,id',
            'id_estado_solicitud' => 'required|integer|exists:estados_solicitud,id',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }else{
            $solicitud = SolicitudesAmistad::find($request->id_solicitud);

            $solicitud->id_estado_solicitud = $request->id_estado_solicitud;
            $solicitud->save();

            if($solicitud->id_estado_solicitud === 2){
                collect([
                    [
                        'user_id' => $request->user()->id,
                        'amigo_id'=> $solicitud->id_usuario
                    ],
                    [
                        'user_id' => $solicitud->id_usuario,
                        'amigo_id'=> $request->user()->id,
                    ],
                ])->each(function ($amigos){
                    Amigos::create($amigos);
                });
            }
            return response()->json(['message' => 'Solicitud resuelta'], 200);
        }
    }

}
