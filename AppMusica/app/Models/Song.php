<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_song';

    public function album(){
        return $this->belongsTo('App\Models\Album');
    }

    public function song_rg(){
        return $this->hasMany('App\Models\Song_GeoRec');
    }

    public function song_genre(){
        return $this->hasMany('App\Models\Song_genre');
    }
}
