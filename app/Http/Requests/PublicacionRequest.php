<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class PublicacionRequest extends Request
{
    public function commonRules(): array{
        return [
            'body' => 'required|string|min:1|max:1000',
            'imagenes' => 'nullable|array',
            'id_visible_privacidad' => 'required|integer|exists:estados_privacidad,id',
            'id_comentario_privacidad' => 'required|integer|exists:estados_privacidad,id',
        ];
    }

    public function commonMessages(): array{
        return [
            'body.required' => 'El campo body es obligatorio.',
            'body.string' => 'El campo body debe ser de tipo texto.',
            'body.min' => 'El campo body debe tener al menos :min caracteres.',
            'body.max' => 'El campo body no puede superar los :max caracteres.',
            'imagenes.array' => 'El campo imagenes tiene que ser un array.',
            'id_visible_privacidad.required' => 'El campo id_visible_privacidad es obligatorio.',
            'id_visible_privacidad.integer' => 'El campo id_visible_privacidad debe ser un entero.',
            'id_visible_privacidad.exists' => 'El estado de privacidad seleccionado no existe.',
            'id_comentario_privacidad.required' => 'El campo id_comentario_privacidad es obligatorio.',
            'id_comentario_privacidad.integer' => 'El campo id_comentario_privacidad debe ser un entero.',
            'id_comentario_privacidad.exists' => 'El estado de privacidad seleccionado no existe.',
        ];
    }
}
