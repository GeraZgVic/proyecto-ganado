<?php

namespace App\Http\Controllers;

use App\Models\Razas;
use Illuminate\Http\Request;

class RazasController extends Controller
{
    public function index()
    {
        return view('razas.razas');
    }


    public function destroy(Razas $raza)
    {
        $raza->delete();
    }
}
