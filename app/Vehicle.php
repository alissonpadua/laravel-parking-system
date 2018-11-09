<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
  protected $fillable = ['client_id', 'brand_id', 'photo', 'color', 'plate', 'model', 'year'];

  public function client(){
    return $this->belongsTo('App\Client');
  }
  public function brand(){
    return $this->belongsTo('App\Brand');
  }
}
