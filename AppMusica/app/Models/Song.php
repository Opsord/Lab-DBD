<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_song';

    public function album(){
        return $this->belongsTo('App\Models\Album');
    }

    public function artist(){
        return $this->belongsTo('App\Models\User');
    }

    public function song_rg(){
        return $this->hasMany('App\Models\Song_GeoRec');
    }

    public function song_genre(){
        return $this->hasMany('App\Models\Song_genre');
    }

    public function song_server(){
        return $this->hasMany('App\Models\Song_server');
    }

    public function like(){
        return $this->hasMany('App\Models\Like');
    }

    public function song_playlist(){
        return $this->hasMany('App\Models\Song_playlist');
    }
}
