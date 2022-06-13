<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_genre';

    public function song_genre(){
        return $this->hasMany('App\Models\Song_genre');
    }

}
