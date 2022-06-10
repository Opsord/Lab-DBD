<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song_GeoRec extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_song_rg';

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }

    public function geographic_restriction(){
        return $this->belongsTo('App\Models\Geographic_restriction');
    }
}
