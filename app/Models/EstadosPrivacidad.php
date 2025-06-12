<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadosPrivacidad extends Model
{
    protected $table = 'estados_privacidad';
    protected $hidden = ['created_at','updated_at'];

}
