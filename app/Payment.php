<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['moviment_id', 'price', 'cpfcliente', 'namecliente', 'vehiclemodel', 'vehicleplate', 'discount', 'inputed_at', 'leaved_at'];

    public function moviment(){
        return $this->belongsTo('App\Moviment');
    }
}
