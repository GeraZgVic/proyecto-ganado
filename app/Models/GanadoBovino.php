<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'id_registro',
        // NUEVOS CAMPOS (FALTA POR ANALIZAR)
        'peso_al_nacer',
        'peso_al_destete',
        'peso_al_year',
        'metodo_prenez',
        'color_bovino'
    ];


    public function getEtapaAttribute()
    {
        if (!$this->fecha_nacimiento) {
            return null; // O alguna otra lógica para manejar fechas de nacimiento nulas
        }

        $fechaNacimiento = Carbon::parse($this->fecha_nacimiento);
        $edadEnMeses = $fechaNacimiento->diffInMonths(Carbon::now());

        $sexo = $this->sexo_id; // 1 para macho, 2 para hembra

        if ($edadEnMeses <= 7) {
            return $sexo == 2 ? 'Lactante hembra' : 'Lactante macho'; // 2 para hembra
        } elseif ($edadEnMeses >= 8 && $edadEnMeses <= 12) {
            return $sexo == 2 ? 'Becerro hembra' : 'Becerro macho'; // 2 para hembra
        } elseif ($edadEnMeses >= 13 && $edadEnMeses <= 24) {
            return $sexo == 2 ? 'Vaquilla' : 'Novillo'; // 2 para hembra
        } else {
            return $sexo == 2 ? 'Vaca' : 'Toro'; // 2 para hembra
        }
    }


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
