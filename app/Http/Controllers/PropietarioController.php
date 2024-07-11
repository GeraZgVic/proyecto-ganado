<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    public function index()
    {
        return view('propietarios.propietarios');
    }
    public function indexUpp()
    {
        return view('propietarios.upp');
    }

    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
    }
}
