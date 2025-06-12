<?php

namespace App\Http\Controllers\API;


use App\Http\Requests\PublicacionRequest;
use App\Models\Publicacion;
use Orion\Http\Controllers\Controller;

class PublicacionController extends Controller
{
    protected $model = Publicacion::class;
    protected $request = PublicacionRequest::class;
}
