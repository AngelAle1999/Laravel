<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Platillos extends Model
{
    protected $table = 'Platillos';
    protected $primaryKey = 'id_platillo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','img_src',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    }
