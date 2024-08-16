<?php

namespace App\Livewire;

use App\Models\Upp;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarUpp extends Component
{
    use WithPagination;
    
    public $search = '';
    
    public function render()
    {
        $query = Upp::orderBy('created_at', 'desc');

        // Filtrar por término
        if ($this->search) {
            $query->where('clave_upp', 'LIKE', "%" . $this->search . "%");
        }

        $upps = $query->paginate(5);


        return view('livewire.mostrar-upp', [
            'upps' => $upps 
        ]);
    }
}
