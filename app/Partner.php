<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
  protected $fillable = ['name', 'discount'];

  public function getDiscountAttribute($value)
  {
      return str_replace('.', ',', $value);
  }

  public function setDiscountAttribute($value)
  {
      $this->attributes['discount'] = str_replace(',', '.', $value);
  }
}
