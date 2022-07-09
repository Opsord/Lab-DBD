<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist_Album extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_artist_album';

    public function album(){
        return $this->belongsTo('App\Models\Album');
    }

    public function artist(){
        return $this->belongsTo('App\Models\Artist');
    }

    
}
