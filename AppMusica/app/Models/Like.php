<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $primaryKey = 'id_like';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }
}
