<?php

use App\Http\Controllers\API\PublicacionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerificarJwtToken;
use Orion\Facades\Orion;
use App\Http\Controllers\API\TipoReaccionController;
use App\Http\Controllers\API\EstadosPrivacidadController;
use App\Http\Controllers\API\ComentariosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/prueba', [\App\Http\Controllers\API\UsersController::class, 'index']);

Route::group(['prefix' => 'catalogo'], function () {
   Orion::resource('tipo-reaccion', TipoReaccionController::class);
   Orion::resource('estado-privacidad', EstadosPrivacidadController::class);
});

Route::group(['prefix' => 'publicacion'],function (){
   Orion::resource('/', PublicacionController::class);
   Orion::resource('/comentarios', ComentariosController::class);
});
