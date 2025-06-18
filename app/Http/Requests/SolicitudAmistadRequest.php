<?php

namespace App\Http\Requests;

use Orion\Http\Requests\Request;

class SolicitudAmistadRequest extends Request
{
   public function storeRules(): array
   {
       return [
           'id_usuario_solicitud' => 'required|integer|exists:users,id',
       ];
   }

   public function updateRules(): array{
       return ['id_estado_solicitud' => 'required|integer|exists:estados_solicitud,id'];
   }

   public function storeMessages(): array
   {
       return [
           'id_usuario_solicitud.integer' => 'El id del usuario debe ser entero.',
           'id_usuario_solicitud.exists' => 'El id del usuario no existe.',
           'id_usuario_solicitud.required' => 'El id del usuario es requerido.',
       ];
   }

   public function updateMessages(): array{
       return [
           'id_estado_solicitud.integer' => 'El id del usuario debe ser entero.',
           'id_estado_solicitud.exists' => 'El id del estado no existe.',
           'id_estado_solicitud.required' => 'El id del usuario es requerido.',
       ];
   }
}
