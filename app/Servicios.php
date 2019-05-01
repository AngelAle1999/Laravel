<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
     protected $primaryKey='id_servicios';
    protected $fillable=['nombre', 'Posicion', 'img_url'];

    public function getRouteKeyName()
    {
return 'nombre';    }
}