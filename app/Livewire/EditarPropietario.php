<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propietario;
use App\Models\Upp;

class EditarPropietario extends Component
{
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $upp_id;
    public $id;
    public $propietarios;

    public function mount()
    {
        $this->propietarios = Propietario::find($this->id);
        // Sincronizar
        $this->nombre = $this->propietarios->nombre;
        $this->apellido_materno = $this->propietarios->apellido_materno;
        $this->apellido_paterno = $this->propietarios->apellido_paterno;
        $this->upp_id = $this->propietarios->upp_id;
        
    }
    public function update()
    {
        $validated = $this->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
            'upp_id' => 'required'
        ]);

        $this->propietarios->update($validated);

        return redirect()->route('propietarios.index')->with('success', '¡Actualizado Correctamente!');
    }

    public function render()
    {
        return view('livewire.editar-propietario', [
            'upps' => $upps = Upp::all()
        ]);
    }
}
