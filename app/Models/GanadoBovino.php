<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GanadoBovino extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_interno',
        'nombre',
        'imagen',
        'estatus_genetico',
        'fecha_nacimiento',
        'fecha_destete',
        'id_siniga',
        'raza_id',
        'sexo_id',
        'propietario_id',
        'estatus_comercio_id',
        'madre_id',
        'padre_id'
    ];


    


}
