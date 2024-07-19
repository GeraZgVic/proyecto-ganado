<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];


    public function bovino()
    {
        return $this->hasMany(GanadoBovino::class, 'sexo_id', 'id');
    }
}
