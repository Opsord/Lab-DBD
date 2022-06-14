<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_user';

    public function user_role(){
        return $this->hasMany('App\Models\User_role');
    }

    public function song(){
        return $this->hasMany('App\Models\Song');
    }

    public function user_user(){
        return $this->hasMany('App\Models\User_user');
    }

    public function subscription(){
        return $this->belongsTo('App\Models\Subscription');
    }

    public function like(){
        return $this->hasMany('App\Models\Like');
    }

    public function user_playlist(){
        return $this->hasMany('App\Models\User_playlist');
    }
}
