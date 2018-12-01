<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    protected $fillable = ['parking_id', 'externalid', 'active'];

    public function parking(){
        return $this->belongsTo('App\Parking');
    }

    public function moviment(){
      return $this->hasOne('App\Moviment');
    }

    public function isBusy(){
        
        $moviments = Moviment::where('space_id', $this->id)->get();

        if(!$moviments){
            return false;
        }

        foreach($moviments as $moviment){

            if($moviment->inputed_at && !$moviment->leaved_at){

                return true;

            }

        }
        
        return false;

    }
}
