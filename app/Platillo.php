<?php

namespace Laravel;

use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    protected $table = 'platillo';
    protected $primaryKey = 'Id_platillo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'img_url', 'status', 'descripcion', 'price','amount','infant_price', 'type_id', 'condition_number_people_1', 'price_number_people_1', 'condition_number_people_2', 'price_number_people_2', 'condition_amount_1', 'price_amount_1', 'condition_amount_2', 'price_amount_2', 'baja'];
}
