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
        // 'imagen',
        'estatus_genetico',
        'fecha_nacimiento',
        'fecha_destete',
        'id_siniiga',
        'raza_id',
        'sexo_id',
        'upp_id',
        'propietario_id',
        'estatus_comercio_id',
        'madre_id_interno',
        'padre_id_interno',
        'id_registro'
    ];


    // Relaciones usando id_interno

    // Relación con la madre
    public function madre()
    {
        return $this->belongsTo(GanadoBovino::class, 'madre_id_interno', 'id_interno');
    }

    // Relación con el padre
    public function padre()
    {
        return $this->belongsTo(GanadoBovino::class, 'padre_id_interno', 'id_interno');
    }

    // Relación con los hijos (donde este animal es la madre)
    public function madreHijo()
    {
        return $this->hasMany(GanadoBovino::class, 'madre_id_interno', 'id_interno');
    }

    // Relación con los hijos (donde este animal es el padre)
    public function padreHijo()
    {
        return $this->hasMany(GanadoBovino::class, 'padre_id_interno', 'id_interno');
    }


    // Otras relaciones
    public function propietario()
    {
        return $this->belongsTo(Propietario::class, 'propietario_id', 'id');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id', 'id');
    }

    public function raza()
    {
        return $this->belongsTo(Razas::class, 'raza_id', 'id');
    }

    public function estatusComercio()
    {
        return $this->belongsTo(EstatusComercio::class, 'estatus_comercio_id', 'id');
    }

    // Un Upp pertenece a un ganado
    public function upp()
    {
        return $this->belongsTo(Upp::class, 'upp_id', 'id');
    }
}
