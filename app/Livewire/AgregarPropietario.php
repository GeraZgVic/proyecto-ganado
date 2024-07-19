<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propietario;
use App\Models\Upp;

class AgregarPropietario extends Component
{
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $upp_id;


    public function save() 
    {
        $validated = $this->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'upp_id' => 'required'
        ]);

        Propietario::create($validated);

          // Añadir notificación a la sesión
          return redirect()->route('propietarios.index')->with('success', '¡Agregado correctamente!');
    }

    public function render()
    {
        $upps = Upp::all();

        return view('livewire.agregar-propietario', [
            'upps' => $upps
        ]);
    }
}
