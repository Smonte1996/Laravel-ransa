<?php

namespace App\Http\Livewire\Higiene;

use App\Models\Employee;
use App\Models\Infor_practicahg;
use Livewire\Component;

class FormularioHigiene extends Component
{
    public $fecha;
    public $evaluador;
    public $almacen;
    public $personal;
    public $supervisores;
    public $uc;
    public $uc1;
    public $uc2;
    public $uc3;
    public $bl;
    public $bl1;
    public $bl2;
    public $bl3;
    public $cl;
    public $cl1;
    public $cl2;
    public $cl3;
    public $na;
    public $na1;
    public $na2;
    public $na3;

    protected $rules =[
        'fecha'=> 'required',
        'evaluador'=> 'required',
        'almacen' => 'required'
    ];

    public function Guardar()
    {
      $datos = $this->validate();
      
      $Infor_ph = Infor_practicahg::create([ 
      
      'fecha' => $datos['fecha'],
      'evaluador' => $datos['evaluador'],
       'almacen' => $datos['almacen'],
        'estado' => 1  
    ]);
    

    // dd($fecha, $Evaluador, $Almacen);

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
