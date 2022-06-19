<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receipt extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_receipt';

    public function payment_method(){
        return $this->belongsTo('App\Models\Payment_method');
    }
}
