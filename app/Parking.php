<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = ['name', 'cnpj'];

    public function spaces(){
        return $this->hasMany('App\Space');
    }
}
