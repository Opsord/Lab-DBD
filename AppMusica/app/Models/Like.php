<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_like';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function song(){
        return $this->belongsTo('App\Models\Song');
    }
}
