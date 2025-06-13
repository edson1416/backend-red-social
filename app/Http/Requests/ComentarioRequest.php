<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class ComentarioRequest extends Request
{
    public function commonRules(): array
    {
        return [
            'comentario' => 'required|string|max:255|min:3',
            'id_publicacion' => 'required|integer|exists:publicaciones,id'
        ];
    }

    public function commonMessages(): array{
        return [
            'comentario.required' => 'El campo comentario es obligatorio.',
            'comentario.string' => 'El campo comentario debe ser texto.',
            'comentario.min' => 'El campo comentario debe tener al :min caracteres.',
            'comentario.max' => 'El campo comentario debe tener al :max caracteres.',
            'id_publicacion.required' => 'El campo id es obligatorio.',
            'id_publicacion.integer' => 'El campo id tiene que ser un entero.',
            'id_publicacion.exists' => 'La publicacion no existe.',
        ];
    }
}
