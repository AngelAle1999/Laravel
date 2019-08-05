<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Mobiliario as Authenticatable;

class CotizacionMobiliario extends Model
{
    use Notifiable;

 protected $table = 'Cotizacion_mobiliario';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'id_cotizacion','id_mobiliario','cantidad', 'price', 'total',
    ];

public function cotizacion(){
      return $this->hasOne('App\Cotizacion','id_cotizacion','id_cotizacion');
    }
public function mobiliario(){
      return $this->hasOne('App\Mobiliario','id_mobiliario','id_mobiliario');
    }
}