<?php

namespace App\Http\Livewire\Higiene;

use Livewire\Component;

class FormularioHigiene extends Component
{
    public $fecha;
    public $evaluador;
    public $almcen;
    
    public function render()
    {
        return view('livewire.higiene.formulario-higiene');
    }
}
