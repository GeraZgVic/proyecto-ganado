<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use App\Models\GanadoBovino;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $propietarios = Propietario::all();
        $bovinos = GanadoBovino::all();
        return view('dashboard',[
            'propietarios' => $propietarios,
            'bovinos' => $bovinos
        ]);
    }
}
