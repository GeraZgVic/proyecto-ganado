<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GanadoBovino;
use Livewire\WithPagination;

class MostrarGanadoBovino extends Component
{
    use WithPagination;

    public $search = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $bovinos = GanadoBovino::orderBy('id_interno', 'asc')->paginate();

        return view('livewire.mostrar-ganado-bovino', [
            'bovinos' => $bovinos
        ]);
    }
}
