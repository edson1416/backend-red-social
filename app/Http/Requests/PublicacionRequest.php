<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Orion\Http\Requests\Request;

class PublicacionRequest extends Request
{
    public function commonRules(): array{
        return [
            'body' => 'required|string|min:1|max:1000',
            'imagen' => 'nullable|file|mimes:jpeg,jpg,png,gif|max:2000',
        ];
    }

    public function commonMessages(): array{
        return [
            'body.required' => 'El campo body es obligatorio.',
            'body.string' => 'El campo body debe ser de tipo texto.',
            'body.min' => 'El campo body debe tener al menos :min caracteres.',
            'body.max' => 'El campo body no puede superar los :max caracteres.',
            'imagen.file' => 'El campo imagen debe ser de tipo imagen.',
            'imagen.mimes' => 'El campo imagen debe ser de :mimes .',
            'imagen.max' => 'El campo imagen debe tener una maximo :max mb.',
        ];
    }
}
