<?php

namespace App\Livewire;

use App\Models\Razas;
use Livewire\Component;

class AgregarRaza extends Component
{

    public $nombre;

    public function save()
    {
        $validated = $this->validate([
            'nombre' => 'required|unique:razas,nombre'
        ]);
        // Crear registro
        Razas::create($validated);

        // Añadir notificación a la sesión
        return redirect()->route('razas.index')->with('success', '¡Agregado correctamente!');
    }

    public function render()
    {
        return view('livewire.agregar-raza');
    }
}
