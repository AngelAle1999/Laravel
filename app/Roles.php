<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  public function user(){
    return $this->belongsToMany('Laravel\User');
 }
}
