<?php

namespace ProductoMinimoViable;

use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table='edificio';

    protected $primaryKey "idedificio";

    public $timestamps = false;


    protected $fillable = [
    'nombre',
    'usuario_id',
    'calle',
    'numero_calle',
    'provincia',
    'localidad',
    'razon_social',
    'cuit',
    'cant_pisos'
    ];

    protected $guarded = [

    
    ];

}
