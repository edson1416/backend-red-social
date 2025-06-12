<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amigos extends Model
{
    protected $table = 'amigos';

    public function amigo(){
        return $this->belongsTo(User::class, 'amigo_id','id');
    }
}
