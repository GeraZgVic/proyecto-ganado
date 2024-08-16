<?php

namespace App\Http\Controllers;

use App\Models\Upp;
use App\Models\Razas;
use App\Models\Propietario;
use App\Models\GanadoBovino;

class DashboardController extends Controller
{
    public function index()
    {
        $etapas = [
            'Lactante hembra' => 0,
            'Lactante macho' => 0,
            'Becerro hembra' => 0,
            'Becerro macho' => 0,
            'Vaquilla' => 0,
            'Novillo' => 0,
            'Vaca' => 0,
            'Toro' => 0,
        ];

        $bovinos = GanadoBovino::all();
        foreach ($bovinos as $bovino) {
            $etapa = $this->calcularEtapa($bovino);
            if ($etapa) {
                $etapas[$etapa]++;
            }
        }

        $propietarios = Propietario::all();
        $upps = Upp::all();
        $razas = Razas::all();

        return view('dashboard', [
            'propietarios' => $propietarios,
            'bovinos' => $bovinos,
            'upps' => $upps,
            'razas' => $razas,
            'etapas' => $etapas
        ]);
    }

    private function calcularEtapa($bovino)
    {
        if (!$bovino->fecha_nacimiento) {
            return null;
        }

        $fechaNacimiento = \Carbon\Carbon::parse($bovino->fecha_nacimiento);
        $edadEnMeses = $fechaNacimiento->diffInMonths(\Carbon\Carbon::now());

        $sexo = $bovino->sexo_id; // 1 para macho, 2 para hembra

        if ($edadEnMeses <= 7) {
            return $sexo == 2 ? 'Lactante hembra' : 'Lactante macho';
        } elseif ($edadEnMeses >= 8 && $edadEnMeses <= 12) {
            return $sexo == 2 ? 'Becerro hembra' : 'Becerro macho';
        } elseif ($edadEnMeses >= 13 && $edadEnMeses <= 24) {
            return $sexo == 2 ? 'Vaquilla' : 'Novillo';
        } else {
            return $sexo == 2 ? 'Vaca' : 'Toro';
        }
    }
}
