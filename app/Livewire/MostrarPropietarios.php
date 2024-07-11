<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propietario;
use Livewire\WithPagination;

class MostrarPropietarios extends Component
{
    use WithPagination;
    
    public function render()
    {
        $propietarios = Propietario::orderBy('created_at', 'desc')->paginate(2);

        return view('livewire.mostrar-propietarios', [
            'propietarios' => $propietarios
        ]);
    }
}
