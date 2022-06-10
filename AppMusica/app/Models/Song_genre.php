<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_genre extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_song_genre';

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }

    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }
}
