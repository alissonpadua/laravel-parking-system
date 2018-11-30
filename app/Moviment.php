<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moviment extends Model
{
  protected $fillable = ['vehicle_id', 'space_id', 'partner_id', 'inputed_at', 'leaved_at'];

  public function vehicle(){
    return $this->belongsTo('App\Vehicle');
  }
  public function space(){
    return $this->belongsTo('App\Space');
  }
  public function partner(){
    return $this->belongsTo('App\Partner');
  }
  public function payment(){
    return $this->hasOne('App\Payment');
  }

}
