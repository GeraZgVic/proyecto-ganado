<?php

namespace App\Http\Controllers;

use App\Models\GanadoBovino;
use Illuminate\Http\Request;

class GanadoBovinoController extends Controller
{
    // Rangos 
    /** Nota: Reemplazar nombres por id del propietario desde una consulta a la base de datos */
    // protected $rangos = [
    //     'Isaias' => ['min' => 100, 'max' => 199, 'color' => 'azul'],
    //     'Ada' => ['min' => 500, 'max' => 599, 'color' => 'blanco'],
    //     'Keila' => ['min' => 600, 'max' => 699, 'color' => 'naranja'],
    //     'Sophia' => ['min' => 700, 'max' => 799, 'color' => 'azul_fuerte'],
    // ];

    public function index() 
    {
        return view('ganado.bovino');
    }

    public function show(GanadoBovino $bovino) {

        return view('ganado.show-bovino', [
            'bovino' => $bovino
        ]);
    }

    public function destroy(GanadoBovino $bovino) {
        $bovino->delete();
    }
}
