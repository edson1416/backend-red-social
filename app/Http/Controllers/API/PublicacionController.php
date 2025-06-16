<?php

namespace App\Http\Controllers\API;


use App\Http\Requests\PublicacionRequest;
use App\Models\Amigos;
use App\Models\ImgPublicaciones;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class PublicacionController extends Controller
{
    protected $model = Publicacion::class;
    protected $request = PublicacionRequest::class;

    public function alwaysIncludes(): array

    {
        return ['user', 'imagenes', 'comentarios.autor', 'configuracion'];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $usuario = $request->user();
        $amigosIds = Amigos::where('user_id', $usuario->id)->pluck('amigo_id');
        $amigosIds->push($usuario->id);

        $query->with(['user' => function ($query) {
            $query->select('id', 'name', 'email');
        },
            'comentarios.autor' => function ($query) {
                $query->select('id', 'name', 'email');
            }
        ])->where(function ($query) use ($amigosIds) {
            $query->whereIn('id', $amigosIds)
                ->orWhereHas('configuracion', function ($query) {
                    $query->where('id_estado_privacidad', 2);
                });
        });

        return $query;
    }

    protected function beforeStore(Request $request, Model $entity)
    {
        $idUsuario = $request->user()->id;
        $request->merge(['user_id' => $idUsuario]);
    }

    protected function afterStore(Request $request, Model $entity)
    {
        $imagenes = $request->file("imagenes", []);

        foreach ($imagenes as $imagen) {
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
            $rutaImagen = $imagen->storeAs('public/imagenes/publicaciones', $nombreImagen);

            ImgPublicaciones::create([
                'id_publicacion' => $entity->id,
                'ruta' => $rutaImagen,
            ]);
        }
    }
}
