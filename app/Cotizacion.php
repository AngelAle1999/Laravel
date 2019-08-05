<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
 protected $table = 'Cotizacion';
    protected $primaryKey = 'id_cotizacion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha', 'hora','n_adultos', 'n_ninos', 'id_cliente', 'disponibilidad_fecha', 'a_domicilio', 'comentarios', 'status', 'pdf_src', 'actualizadas', 'enviadas', 'fecha_envio', 'id_user', 'iva',
    ];

     public function cotizaciones(){
      return $this->hasMany('App\Cotizaciones', 'id_usuario', 'id_usuario');
    }
    }