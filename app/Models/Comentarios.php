<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentarios extends Model
{
    protected $table = 'comentarios';
    protected $fillable = [
        'comentario',
        'id_publicacion',
        'id_autor',
    ];

    public function publicacion(): BelongsTo{
        return $this->belongsTo(Publicacion::class);
    }

    public function autor() {
        return $this->belongsTo(User::class, 'id_autor');
    }

}
