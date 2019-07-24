<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Mobiliario extends Model
{

    protected $table = 'mobiliario';
    protected $primaryKey = 'id_mobiliario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'presentation', 'description', 'stock', 'img_src', 'price', 'baja',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    }