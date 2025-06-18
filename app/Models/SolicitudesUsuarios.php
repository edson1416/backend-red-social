<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudesUsuarios extends Model
{
    protected $table = 'solicitudes_usuarios';
    protected $fillable = [
        'id_usuario',
        'id_solicitud'
    ];
}
