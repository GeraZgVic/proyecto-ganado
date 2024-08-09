<?php

namespace App\Livewire;

use App\Models\Upp;
use App\Models\Sexo;
use App\Models\Razas;
use Livewire\Component;
use App\Models\Propietario;
use App\Models\GanadoBovino;
use App\Models\EstatusComercio;

class AgregarGanadoBovino extends Component
{


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

    // NUEVOS CAMPOS (FALTAN POR ANALIZAR)
    public $peso_al_nacer;
    public $peso_al_destete;
    public $peso_al_year;

    public $selectedOption = 0;

    public function save()
    {
        $validated = $this->validate([
            'id_interno' => 'required|unique:ganado_bovinos,id_interno',
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
            'upp_id' => 'required',
            // NUEVOS CAMPOS
            'peso_al_nacer' => 'nullable',
            'peso_al_destete' => 'nullable',
            'peso_al_year' => 'nullable'
        ]);

        // Convertir los valores vacíos a NULL -> Para madre y padre id
        foreach ($validated as $key => $value) {
            if ($value === '') {
                $validated[$key] = null;
            }
        }

        GanadoBovino::create($validated);

        return redirect()->route('bovino.index')->with('success', '¡Agregado correctamente!');
    }

    public function render()
    {
        $razas = Razas::all();
        $sexos = Sexo::all();
        $upps = Upp::all();
        $propietarios = Propietario::all();
        $estatusComercios = EstatusComercio::all();

        return view('livewire.agregar-ganado-bovino', [
            'razas' => $razas,
            'sexos' => $sexos,
            'propietarios' => $propietarios,
            'estatusComercios' => $estatusComercios,
            'upps' => $upps
        ]);
    }
}
