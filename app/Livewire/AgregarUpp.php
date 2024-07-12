<?php

namespace App\Livewire;

use App\Models\Upp;
use Livewire\Component;

class AgregarUpp extends Component
{

    public $clave_upp;

    public function save()
    {
        $validated = $this->validate([
            'clave_upp' => 'required|min:12|max:12'
        ]);

        // Crear registro
        Upp::create($validated);

        // Añadir notificación a la sesión
        return redirect()->route('upp.index')->with('success', '¡Agregado correctamente!');
    }


    public function render()
    {
        return view('livewire.agregar-upp');
    }
}
