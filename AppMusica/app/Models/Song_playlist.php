<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_playlist extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_song_playlist';

    public function playlist(){
        return $this->belongsTo('App\Models\Playlist');
    }

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }
}
