<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ComentarioRequest;
use App\Models\Comentarios;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Model;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ComentariosController extends Controller
{
    protected $model = Comentarios::class;
    protected $request = ComentarioRequest::class;

    protected function beforeStore(Request $request, Model $entity)
    {
        $idUsuario = $request->user()->id;
        $idPublicacion = $request->id_publicacion;
        $publicacion = Publicacion::with('configuracion','user.amigos')->find($idPublicacion);

        if($idUsuario == $publicacion->usuario_id || $publicacion->user->amigos->first()?->amigo_id == $idUsuario){
            $request->merge(['id_autor' => $idUsuario]);
        }
        else{
            throw_if($publicacion->configuracion->id_comentario_privacidad == 1, AccessDeniedHttpException::class,"Publicacion privada");
        }
    }
}
