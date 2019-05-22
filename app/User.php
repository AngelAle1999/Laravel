<?php

namespace Laravel;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id_rol', 'imagen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol(){
      return $this->hasOne('App\Roles','id_rol','id_rol');
    }

    public function cotizaciones(){
      return $this->hasMany('App\Cotizaciones', 'id', 'id_usuario');
    }

    public function seguimientos(){
      return $this->belongsTo('App\Seguimiento','id', 'id_usuario');
    }

}
