<?php

namespace App\Http\Controllers;

use App\Models\Upp;
use App\Models\Razas;
use App\Models\Propietario;
use App\Models\GanadoBovino;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $propietarios = Propietario::all();
        $bovinos = GanadoBovino::all();
        $upps = Upp::all();
        $razas = Razas::all();
        
        return view('dashboard',[
            'propietarios' => $propietarios,
            'bovinos' => $bovinos,
            'upps' => $upps,
            'razas' => $razas
        ]);
    }
}
