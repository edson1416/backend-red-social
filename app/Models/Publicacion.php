<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    protected $table = 'publicaciones';
    protected $fillable = [
        'body',
        'url_imagen',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function imagenes(){
        return $this->hasMany(ImgPublicaciones::class,'id_publicacion');
    }

    public function comentarios(){
        return $this->hasMany(Comentarios::class,'id_publicacion');
    }

    public function configuracion(){
        return $this->hasMany(ConfigPublicacion::class,'id_publicacion');
    }
}
