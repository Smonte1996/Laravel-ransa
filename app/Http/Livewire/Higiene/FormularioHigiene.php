<?php

namespace App\Http\Livewire\Higiene;

use App\Models\Employee;
use Livewire\Component;

class FormularioHigiene extends Component
{
    public $fecha;
    public $evaluador;
    public $almacen;
    public $personal;
    public $supervisores;
    
    public function Guardar()
    {

    }

    function mount() 
    {
        $this->personal = Employee::all();
        $this->supervisores = Employee::where('position_id', 3)->get();
    }

    public function render()
    {
        return view('livewire.higiene.formulario-higiene');
    }


}
