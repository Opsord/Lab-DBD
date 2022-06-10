<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geographic_restriction extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_country';

    public function song_rg(){
        return $this->hasMany('App\Models\SongRG');
    }
    
}
