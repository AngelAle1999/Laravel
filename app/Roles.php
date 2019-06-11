<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model{
  protected $table = 'roles';
  protected $primaryKey = 'id_roles';
  protected $fillable =  ['rol'];

  public function user(){
    return $this->belongsTo('App\User','id_roles','id_roles');
  }

}
