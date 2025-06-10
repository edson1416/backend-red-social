<?php

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerificarJwtToken;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/prueba', function () {
  return response()->json(['mensaje' => 'prueba']);
})->middleware(VerificarJwtToken::class);
