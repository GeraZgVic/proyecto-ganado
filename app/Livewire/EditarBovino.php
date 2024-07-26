<?php

namespace App\Livewire;

use App\Models\Upp;
use App\Models\Sexo;
use App\Models\Razas;
use Livewire\Component;
use App\Models\Propietario;
use App\Models\GanadoBovino;
use App\Models\EstatusComercio;

class EditarBovino extends Component
{
    public $id;

    public $nombre; // Nombre de la vaca,bovino,toro,etc
    public $id_interno; // Id asignado manual determina el color.
    public $imagen; // Pendiente
    public $estatus_genetico; // Manual Eje: Vacia/Receptora
    public $fecha_nacimiento;
    public $fecha_destete;
    public $id_siniiga;
    public $raza_id;
    public $sexo_id;
    public $propietario_id;
    public $estatus_comercio_id;
    public $madre_id_interno;
    public $padre_id_interno;
    public $id_registro;
    public $upp_id;

    public $ganadoBovino;



    public function mount()
    {
        $this->ganadoBovino = GanadoBovino::find($this->id);
        // Sincronizar
        $this->nombre = $this->ganadoBovino->nombre;
        $this->id_interno = $this->ganadoBovino->id_interno;
        $this->estatus_genetico = $this->ganadoBovino->estatus_genetico;
        $this->fecha_nacimiento = $this->ganadoBovino->fecha_nacimiento;
        $this->fecha_destete = $this->ganadoBovino->fecha_destete;
        $this->id_siniiga = $this->ganadoBovino->id_siniiga;
        $this->raza_id = $this->ganadoBovino->raza_id;
        $this->sexo_id = $this->ganadoBovino->sexo_id;
        $this->propietario_id = $this->ganadoBovino->propietario_id;
        $this->estatus_comercio_id = $this->ganadoBovino->estatus_comercio_id;
        $this->madre_id_interno = $this->ganadoBovino->madre_id_interno;
        $this->padre_id_interno = $this->ganadoBovino->padre_id_interno;
        $this->id_registro = $this->ganadoBovino->id_registro;
        $this->upp_id = $this->ganadoBovino->upp_id;
    }



    public function update()
    {
        $validated = $this->validate([
            // 'id_interno' => 'required|unique:ganado_bovinos,id_interno',
            'id_interno' => [
                'required',
                // La validación 'unique' ignora el registro actual durante la actualización
                'unique:ganado_bovinos,id_interno,' . $this->ganadoBovino->id,
            ],
            'nombre' => 'required',
            // 'imagen' => 'nullable', //EN espera
            'id_registro' => 'nullable',
            // 'estatus_genetico' => 'required|in:Vacía,Preñada,Donadora,Receptora',
            'estatus_genetico' => 'nullable',
            'fecha_nacimiento' => 'nullable',
            'fecha_destete' => 'nullable',
            'id_siniiga' => 'nullable',
            'raza_id' => 'required',
            'sexo_id' => 'required',
            'propietario_id' =>  'required',
            'estatus_comercio_id' => 'required',
            'madre_id_interno' => 'nullable|exists:ganado_bovinos,id_interno',
            'padre_id_interno' => 'nullable|exists:ganado_bovinos,id_interno',
            'upp_id' => 'required'
        ]);

        $this->ganadoBovino->update($validated);

        return redirect()->route('bovino.index')->with('success', '¡Actualizado Correctamente!');
    }


    public function render()
    {
        $razas = Razas::all();
        $sexos = Sexo::all();
        $upps = Upp::all();
        $propietarios = Propietario::all();
        $estatusComercios = EstatusComercio::all();


        return view('livewire.editar-bovino', [
            'razas' => $razas,
            'sexos' => $sexos,
            'propietarios' => $propietarios,
            'estatusComercios' => $estatusComercios,
            'upps' => $upps
        ]);
    }
}
