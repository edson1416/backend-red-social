<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudesAmistad extends Model
{
    protected $table = 'solicitudes_amistad';
    protected $fillable = [
        'id_usuario',
        'id_estado_solicitud',
    ];

}
