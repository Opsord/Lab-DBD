<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_role';

    public function user_role(){
        return $this->hasMany('App\Models\User_role');
    }

    public function role_permission(){
        return $this->hasMany('App\Models\Role_permission');
    }


}
