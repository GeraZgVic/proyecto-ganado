<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstatusComercio extends Model
{
    protected $table = 'estatus_comercio';
    
    protected $fillable = [
        'tipo_ganado'
    ];

    use HasFactory;


    public function bovino()
    {
        return $this->hasOne(GanadoBovino::class, 'estatus_comercio_id', 'id');
    }
}
