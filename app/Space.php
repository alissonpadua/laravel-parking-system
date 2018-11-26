<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = ['parking_id', 'externalid', 'active'];

    public function parking(){
        return $this->belongsTo('App\Parking');
    }
}
