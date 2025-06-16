<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfigPublicacion extends Model
{
    protected $table = 'config_publicaciones';
    protected $fillable = ['id_publicacion', 'id_estado_privacidad'];
    protected $hidden = ['created_at','updated_at'];

    public function publicaciones(){
        return $this->belongsTo(Publicacion::class);
    }

}
