<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Propietario extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'apellido_materno',
        'apellido_paterno',
        'upp_id'
    ];
    

    public function upp(): HasOne
    {
        return $this->HasOne(Upp::class, 'id', 'upp_id'); // 'id' es el nombre de la clave primaria de la abla 'upp'
    }

    public function bovinos(): HasMany 
    {
        return $this->hasMany(GanadoBovino::class, 'propietario_id', 'id');
    }

    
}
