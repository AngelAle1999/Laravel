<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class TypePlatillos extends Model
{
  protected $table = 'typeplatillos';
    protected $primaryKey = 'id_type_platillos';
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
