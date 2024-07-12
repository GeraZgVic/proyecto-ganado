<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Upp extends Model
{
    use HasFactory;

    protected $fillable = ['clave_upp'];


    // Un upp pertenece a un propietario
    public function propietario(): BelongsTo
    {
        return $this->belongsTo(Propietario::class, 'upp_id', 'id'); // 'upp_id' es la clave externa en la tabla 'upps', 'id' es la clave primaria en 'propietarios'
    }
}
