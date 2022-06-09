<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_receipt';

    public function subject(){
        return $this->belongsTo('App\Models\Payment_method');
    }
}
