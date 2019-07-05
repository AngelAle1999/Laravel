<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
   protected $table = 'Plantilla';
    protected $primaryKey = 'id_plantilla';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'baja', 'content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
   
    }