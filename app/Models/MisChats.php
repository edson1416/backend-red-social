<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MisChats extends Model
{
    protected $table = 'mis_chats';

    protected $hidden = ['created_at','updated_at'];

    public function chats(){
        return $this->belongsTo(Chat::class, 'chat_id');
    }
}
