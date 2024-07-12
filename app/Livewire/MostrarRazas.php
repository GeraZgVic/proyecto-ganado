<?php

namespace App\Livewire;

use App\Models\Razas;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarRazas extends Component
{
    use WithPagination;

    public function render()
    {

        $razas = Razas::orderBy('created_at', 'desc')->paginate(10);
        
        return view('livewire.mostrar-razas', compact('razas'));
    }
}
