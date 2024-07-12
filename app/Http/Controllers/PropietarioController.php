<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use App\Models\Upp;
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
    
    public function destroyUpp(Upp $upp)
    {
        $upp->delete();
    }
}
