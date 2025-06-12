<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoReaccion extends Model
{
    protected $table = 'tipo_reacciones';
    protected $hidden = ['created_at','updated_at'];
}
