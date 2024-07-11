<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $fillable = [
        'nombre',
        'apellido_materno',
        'apellido_paterno',
        'upp'
    ];

    use HasFactory;
}
