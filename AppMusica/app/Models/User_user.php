<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_user extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_user_user';
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}
