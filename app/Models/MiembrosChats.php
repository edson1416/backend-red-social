<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiembrosChats extends Model
{
    protected $table = 'miembros_chats';

    public function chats(){
        return $this->belongsTo(Chat::class, 'chat_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
