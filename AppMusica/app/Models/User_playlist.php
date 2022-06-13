<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_playlist extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user_playlist';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function playlist(){
        return $this->belongsTo('App\Models\Playlist');
    }
}
