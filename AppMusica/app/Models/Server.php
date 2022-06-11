<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_server';

    public function song_server(){
        return $this->hasMany('App\Models\Song_server');
    }
    
}
