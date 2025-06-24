<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    public function misChats(){
        return $this->hasMany(MisChats::class,'chat_id');
    }

    public function miembros(){
        return $this->hasMany(MiembrosChats::class,'chat_id');
    }
}
