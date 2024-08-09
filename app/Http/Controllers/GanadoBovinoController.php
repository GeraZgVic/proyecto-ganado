<?php

namespace App\Http\Controllers;

use App\Models\GanadoBovino;
use Illuminate\Http\Request;

class GanadoBovinoController extends Controller
{
    
    public function index()
    {
        return view('ganado.bovino');
    }

    public function getColorById($id)
    {
        if ($id >= 100 && $id <= 199) {
            return 'bg-blue-500';
        } elseif ($id >= 500 && $id <= 599) {
            return 'bg-white';
        } elseif ($id >= 600 && $id <= 699) {
            return 'bg-amber-500';
        } elseif ($id >= 700 && $id <= 799) {
            return 'bg-blue-700';
        }
        return 'bg-gray-500'; // Color por defecto
    }

    public function show(GanadoBovino $bovino)
    {
        $colorClass = $this->getColorById($bovino->id_interno);
        

        return view('ganado.show-bovino', [
            'bovino' => $bovino,
            'colorClass' => $colorClass
        ]);
    }

    public function destroy(GanadoBovino $bovino)
    {
        $bovino->delete();
    }
}
