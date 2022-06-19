<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song_server extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_song_server';

    public function server(){
        return $this->belongsTo('App\Models\Server');
    }

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }
}
