<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImgPublicaciones extends Model
{
    protected $table = 'img_publicaciones';
    protected $fillable = [
        'id_publicacion',
        'ruta'
    ];
    protected $hidden = ['created_at','updated_at'];

    public function publicacion(){
        return $this->belongsTo(Publicacion::class);
    }

}
