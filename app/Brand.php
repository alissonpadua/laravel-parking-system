<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function vehicles(){
      return $this->hasMany('App\Vehicle');
    }
}
