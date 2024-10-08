<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\GanadoBovino;
use App\Models\Propietario;
use App\Models\Razas;
use App\Models\Sexo;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class MostrarGanadoBovino extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $propietario_id = '';

    #[Url(history: true)]
    public $raza_id = '';

    #[Url(history: true)]
    public $sexo_id = '';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPropietarioId() {
        $this->resetPage();
    }

    public function updatingRazaId() {
        $this->resetPage();
    }

    public function updatingSexoId(){
        $this->resetPage();
    }

    
    public function render()
    {
        $query = GanadoBovino::orderBy('id_interno', 'asc');

        // Filtrar por término
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nombre', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('id_siniiga', 'LIKE', "%" . $this->search . "%")
                    ->orWhere('id_interno', 'LIKE', "%" . $this->search . "%");
            });
        }

        // Filtrar por propietario
        if ($this->propietario_id) {
            $query->whereHas('propietario', function ($q) {
                $q->where('id', $this->propietario_id);
            });
        }

        // Filtrar por raza
        if ($this->raza_id) {
            $query->whereHas('raza', function ($q) {
                $q->where('id', $this->raza_id);
            });
        }

        // Filtrar por sexo
        if ($this->sexo_id) {
            $query->whereHas('sexo', function ($q) {
                $q->where('id', $this->sexo_id);
            });
        }

        $bovinos = $query->paginate(10);

        return view('livewire.mostrar-ganado-bovino', [
            'bovinos' => $bovinos,
            'propietarios' => Propietario::all(),
            'razas' => Razas::all(),
            'sexos' => Sexo::all()
        ]);
    }
}
