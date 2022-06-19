<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User_user extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $primaryKey = 'id_user_user';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
