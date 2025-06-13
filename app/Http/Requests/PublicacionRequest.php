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
        ];
    }

    public function commonMessages(): array{
        return [
            'body.required' => 'El campo body es obligatorio.',
            'body.string' => 'El campo body debe ser de tipo texto.',
            'body.min' => 'El campo body debe tener al menos :min caracteres.',
            'body.max' => 'El campo body no puede superar los :max caracteres.',
            'imagenes.array' => 'El campo imagenes tiene que ser un array.',
            'imagenes.image' => 'El campo imagen tiene que ser una imagen.',
            'imagenes.mimes' => 'Este tipo de imagen no es permitido.',
            'imagenes.max' => 'La imagen excede los 5MB.'
        ];
    }
}
