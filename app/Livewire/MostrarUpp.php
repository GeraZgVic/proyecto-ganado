<?php

namespace App\Livewire;

use App\Models\Upp;
use Livewire\Component;
use Livewire\WithPagination;

class MostrarUpp extends Component
{
    use WithPagination;
    
    public function render()
    {
        return view('livewire.mostrar-upp', [
            'upps' => $upps = Upp::orderBy('created_at', 'desc')->paginate(2)
        ]);
    }
}
