<?php

namespace App\Livewire;

use App\Models\GanadoBovino;
use Livewire\Component;

class MostrarGanadoBovino extends Component
{
    public function render()
    {
        $bovinos = GanadoBovino::orderBy('created_at', 'desc')->paginate();

        return view('livewire.mostrar-ganado-bovino', [
            'bovinos' => $bovinos
        ]);
    }
}
