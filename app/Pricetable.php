<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricetable extends Model
{
  protected $fillable = ['normalprice', 'overtimeprice'];

  public function getNormalpriceAttribute($value)
  {
      return str_replace('.', ',', $value);
  }

  public function setNormalpriceAttribute($value)
  {
      $this->attributes['normalprice'] = str_replace(',', '.', $value);
  }

  public function getOvertimepriceAttribute($value)
  {
      return str_replace('.', ',', $value);
  }

  public function setOvertimepriceAttribute($value)
  {
      $this->attributes['overtimeprice'] = str_replace(',', '.', $value);
  }
}
