<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moviment extends Model
{
  protected $fillable = ['vehicle_id', 'space_id', 'partner_id', 'inputed_at', 'leaved_at'];

  public function vehicle(){
    return $this->hasOne('App\Vehicle');
  }
  public function space(){
    return $this->hasOne('App\Space');
  }
  public function partner(){
    return $this->hasOne('App\Partner');
  }

}
