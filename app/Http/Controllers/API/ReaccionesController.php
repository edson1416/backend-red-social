<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReaccionRequest;
use App\Models\Publicacion;
use App\Models\Reacciones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReaccionesController extends Controller
{
    function reaccionar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_tipo_reaccion' => 'required|integer|exists:tipo_reacciones,id',
            'id_publicacion' => 'required|integer|exists:publicaciones,id',
        ],
            [
                'id_tipo_reaccion.required' => 'El campo id_tipo_reaccion es obligatorio.',
                'id_tipo_reaccion.integer' => 'El campo id_tipo_reaccion debe ser un entero.',
                'id_tipo_reaccion.exists' => 'El campo id_tipo_reaccion no existe.',
                'id_publicacion.required' => 'El campo id_publicacion es obligatorio.',
                'id_publicacion.integer' => 'El campo id_publicacion debe ser un entero.',
                'id_publicacion.exists' => 'El campo id_publicacion no existe.',
            ]);
        $reaccion = null;
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $reaccion = Reacciones::where('id_usuario', $request->user()->id)->where('id_publicacion', $request->id_publicacion)->first();
            if ($reaccion) {
                //si ya reacciono se actualiza la reaccion
                $reaccion->id_tipo_reaccion = $request->id_tipo_reaccion;
                $reaccion->save();
                //return response()->json(['mensaje' => 'reaccion actualizada', 'reaccion' => $reaccion]);
            } else {
                $reaccion = Reacciones::create(
                    [
                        'id_tipo_reaccion' => $request->id_tipo_reaccion,
                        'id_publicacion' => $request->id_publicacion,
                        'id_usuario' => $request->user()->id,
                    ]
                );
            }
            return response()->json(['mensaje' => 'reaccion agregada', 'reaccion' => $reaccion]);
        }
    }
}
