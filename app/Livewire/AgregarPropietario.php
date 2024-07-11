<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propietario;

class AgregarPropietario extends Component
{
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $upp;


    public function save() 
    {
        $validated = $this->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'upp' => 'required|unique:propietarios,upp'
        ]);

        Propietario::create($validated);

          // Añadir notificación a la sesión
          return redirect()->route('propietarios.index')->with('success', '¡Agregado correctamente!');
    }

    public function render()
    {
        return view('livewire.agregar-propietario');
    }
}
