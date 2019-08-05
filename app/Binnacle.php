<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
 protected $table = 'Binnacle';
    protected $primaryKey = 'id_binnacle';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_cotizacion', 'history','fecha', 'hora', 'status', 'id_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    }