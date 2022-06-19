<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Playlist extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $primaryKey = 'id_playlist';

    public function song_playlist(){
        return $this->hasMany('App\Models\Song_playlist');
    }

    public function user_playlist(){
        return $this->hasMany('App\Models\User_playlist');
    }
}
