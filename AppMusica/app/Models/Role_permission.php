<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role_permission extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_role_permission';
    
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function permission(){
        return $this->belongsTo('App\Models\Permission');
    }
}
