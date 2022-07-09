<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_album';

    public function distributor(){
        return $this->belongsTo('App\Models\Distributor');
    }

    public function Artist_Album(){
        return $this->hasMany('App\Models\Artist_Album');
    }
}
