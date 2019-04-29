<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Integrantes extends Model
{

    protected $primaryKey='id_integrantes';
    protected $fillable=['nombre', 'correo', 'img_url'];

    public function getRouteKeyName()
    {
return 'nombre';    }
}
