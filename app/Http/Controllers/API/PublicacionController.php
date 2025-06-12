<?php

namespace App\Http\Controllers\API;


use App\Http\Requests\PublicacionRequest;
use App\Models\Amigos;
use App\Models\Publicacion;
use Illuminate\Database\Eloquent\Builder;
use Orion\Http\Controllers\Controller;
use Orion\Http\Requests\Request;

class PublicacionController extends Controller
{
    protected $model = Publicacion::class;
    protected $request = PublicacionRequest::class;

    public function alwaysIncludes(): array
    {
        return ['user'];
    }

    protected function buildIndexFetchQuery(Request $request, array $requestedRelations): Builder
    {
        $query = parent::buildIndexFetchQuery($request, $requestedRelations);

        $usuario = $request->user();
        $amigosIds = Amigos::where('user_id', $usuario->id)->pluck('amigo_id');
        $amigosIds->push($usuario->id);

        $query->with(['user' => function ($query) {
            $query->select('id', 'name', 'email');
        }])->whereIn('id', $amigosIds);

        return $query;
    }
}
