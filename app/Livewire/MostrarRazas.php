<?php

namespace App\Livewire;

use App\Models\Razas;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarRazas extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        $query = Razas::orderBy('created_at', 'desc');

        // Filtrar por término
        if ($this->search) {
            $query->where('nombre', 'LIKE', "%" . $this->search . "%");
        }

        $razas = $query->paginate(5);

        return view('livewire.mostrar-razas', compact('razas'));
    }
}
