<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propietario;
use Livewire\WithPagination;

class MostrarPropietarios extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Propietario::orderBy('created_at', 'desc');

        // Filtrar por término
        if ($this->search) {
            $query->where('nombre', 'LIKE', "%" . $this->search . "%");
        }

        $propietarios = $query->paginate(5);
        return view('livewire.mostrar-propietarios', compact('propietarios'));
    }
}
