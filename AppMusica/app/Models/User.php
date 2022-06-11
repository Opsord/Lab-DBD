<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user';

    public function user_role(){
        return $this->hasMany('App\Models\User_role');
    }

    public function song(){
        return $this->hasMany('App\Models\Song');
    }

    public function subscription(){
        return $this->belongsTo('App\Models\Subscription');
    }
    
    public function user_user(){
        return $this->hasMany('App\Models\User_user');
    }


}
