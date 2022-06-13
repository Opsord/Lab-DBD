<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song_genre extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_song_genre';

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }

    public function genre(){
        return $this->belongsTo('App\Models\Genre');
    }
}
