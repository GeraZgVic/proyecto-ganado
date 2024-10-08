<?php

namespace App\Livewire;

use App\Models\Upp;
use Livewire\Component;

class EditarUpp extends Component
{

    public $clave_upp;
    public $id;
    public $upp;
    public $predio;
    public $hectarea;


    // Obtener valores de bd - Similar a __construct()
    public function mount()
    {
        $this->upp = Upp::find($this->id);
        // Vincular nombre de bd con nombre del form
        $this->clave_upp = $this->upp->clave_upp;
        $this->predio = $this->upp->predio;
        $this->hectarea = $this->upp->hectarea;
    }

    public function update()
    {
        // Validar campo
        $validated = $this->validate([
            'clave_upp' => 'required|min:12|max:12',
            'predio' => 'required',
            'hectarea' => 'nullable'
        ]);
        
        // Actualizar registro
        $this->upp->update($validated);

        // Redireccionar
        return redirect()->route('upp.index')
        ->with('success', '¡Actualizado correctamente!');

    }

    public function render()
    {
        return view('livewire.editar-upp');
    }
}
