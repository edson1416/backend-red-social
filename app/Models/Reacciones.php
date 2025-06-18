<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reacciones extends Model
{
    protected $table = 'reacciones';
    protected $fillable = [
        'id_tipo_reaccion',
        'id_publicacion',
        'id_usuario',
    ];
    protected $hidden = ['created_at','updated_at'];

    public function publicacion(){
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }

    public function tipo_reaccion(){
        return $this->belongsTo(TipoReaccion::class, 'id_tipo_reaccion');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
