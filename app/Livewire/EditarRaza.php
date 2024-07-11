<?php

namespace App\Livewire;

use App\Models\Razas;
use Livewire\Component;

class EditarRaza extends Component
{
    public $nombre;
    public $id;
    public $raza;


    // Obtener valores de bd - Similar a __construct()
    public function mount()
    {
        $this->raza = Razas::find($this->id);
        // Vincular nombre de bd con nombre del form
        $this->nombre = $this->raza->nombre;
    }

    public function update()
    {
        // Validar campo
        $validated = $this->validate([
            'nombre' => 'required'
        ]);
        
        // Actualizar registro
        $this->raza->update($validated);

        // Redireccionar
        return redirect()->route('razas.index')
        ->with('success', '¡Actualizado correctamente!');
        
    }

    public function render()
    {
        return view('livewire.editar-raza');
    }
}
