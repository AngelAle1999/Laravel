<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
  public function roles(){
    return $this->belongsToMany('Laravel\Roles');
 }
}
