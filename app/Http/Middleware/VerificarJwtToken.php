<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerificarJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authHeader = $request->header('Authorization');

        if (!$authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            return response()->json(['error' => 'Token no proporcionado'], 401);
        }

        $token = substr($authHeader, 7);

        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS512'));
            $user = User::find($decoded->id);
            if (!$user) {
                return response()->json(['error' => 'Usuario no encontrado'], 401);
            }

            Auth::setUser($user);

            $request->attributes->set('jwt_payload', $decoded);

        } catch (\Exception $exception) {
            return response()->json(['error' => 'Token invalido o expirado',
                'mensaje' => $exception->getMessage()], 401);
        }

        return $next($request);
    }
}
