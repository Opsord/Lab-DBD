<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_subscription';

    public function payMeth(){
        
        return $this->belongsTo('App\Models\Payment_method');
    }
    
    public function user(){
        
        return $this->hasMany('App\Models\User');
    }
}
