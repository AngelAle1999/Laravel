<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class TypePlatillos extends Model
{
  protected $table = 'type_platillos';
    protected $primaryKey = 'id_type_platillo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','img_src', 'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    }
