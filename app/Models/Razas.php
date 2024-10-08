<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Razas extends Model
{
    protected $fillable = [
        'nombre'
    ];

    use HasFactory;

    public function bovino()
    {
        return $this->hasOne(GanadoBovino::class, 'raza_id', 'id');
    }
}
