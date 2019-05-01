<?php

namespace Laravel;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
 public function roles(){
    return $this->belongsToMany('Laravel\User');
 }
 public function authorizeRoles($roles){
    if($this->hasAnyRole($roles)){
        return true;
    }
     abort(401,'This action is unauthorized');
 }
 public function hasRole($role){
    if($this->Roles()->where('nombre',$role)->first()){
        return true;
    }
    return false;
 }

 public function hasAnyRole($roles){
    if(is_array($roles)){
        foreach($roles as $rol){
            return true;
        }
    }
 else{
    if($this->hasRole($roles)){
        return true;
    }
    return false;
 }
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
