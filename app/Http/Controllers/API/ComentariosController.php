<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ComentarioRequest;
use App\Models\Comentarios;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class ComentariosController extends Controller
{
    protected $model = Comentarios::class;
    protected $request = ComentarioRequest::class;

    protected function beforeStore(Request $request, Model $entity)
    {
        $idUsuario = $request->user()->id;
        $request->merge(['id_autor' => $idUsuario]);
    }
}
