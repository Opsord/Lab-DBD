<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_permission';

    public function role_permission(){
        return $this->hasMany('App\Models\Role_permission');
    }

}
