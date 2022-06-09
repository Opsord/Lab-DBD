<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_method';

    public function subscription(){
        return $this->hasMany('App\Models\Subscription');
    }

    public function receipt(){
        return $this->hasMany('App\Models\Receipt');
    }
}
