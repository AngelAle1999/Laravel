<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Platillo as Authenticatable;

class CotizacionPlatillo extends Model
{
      use Notifiable;

  protected $table = 'cotizacion_platillo';
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_cotizacion','id_platillo', 'cantidad', 'price', 'total',
    ];


public function cotizacion(){
      return $this->hasOne('App\Cotizacion','id_cotizacion','id_cotizacion');
    }
public function platillo(){
      return $this->hasOne('App\Platillo','Id_platillo','id_platillo');
    }
}