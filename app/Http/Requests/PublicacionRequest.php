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
            'id_estado_privacidad' => 'required|integer|exists:estados_privacidad,id',
        ];
    }

    public function commonMessages(): array{
        return [
            'body.required' => 'El campo body es obligatorio.',
            'body.string' => 'El campo body debe ser de tipo texto.',
            'body.min' => 'El campo body debe tener al menos :min caracteres.',
            'body.max' => 'El campo body no puede superar los :max caracteres.',
            'imagenes.array' => 'El campo imagenes tiene que ser un array.',
            'id_estado_privacidad.required' => 'El campo id_estado_privacidad es obligatorio.',
            'id_estado_privacidad.integer' => 'El campo id_estado_privacidad debe ser un entero.',
            'id_estado_privacidad.exists' => 'El estado de privacidad seleccionado no existe.',
        ];
    }
}
