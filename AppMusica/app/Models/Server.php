<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Server extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $primaryKey = 'id_server';

    public function song_server(){
        return $this->hasMany('App\Models\Song_server');
    }
    
}
