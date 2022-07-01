<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Geographic_restriction extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_country';

    public function song_rg(){
        return $this->hasMany('App\Models\Song_GeoRec');
    }
}
