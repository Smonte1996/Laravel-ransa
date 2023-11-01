<?php

namespace App\Http\Livewire\Higiene;

use App\Models\Infor_practicahg;
use Livewire\Component;

class FormularioHigieneMaquila extends Component
{
    public $Infor_ph;
    public $fecha;
    public $Evaluador;
    public $Almacen;
    public $Supervisor;
    public $Personal_Maquila;
    public $muc;
    public $muc1;
    public $muc2;
    public $mbl  ;
    public $mbl1;
    public $mbl2;
    public $mcl;
    public $mcl1;
    public $mcl2;
    public $mcp;
    public $mcp1;
    public $mcp2;
    public $mna;
    public $mna1;
    public $mna2;
    public $mul;
    public $mul1;
    public $mul2;
    public $mnp;
    public $mnp1;
    public $mnp2;
    public $mml;
    public $mml1;
    public $mml2;
    public $mnaa;
    public $mnaa1;
    public $mnaa2;
    public $mub;
    public $mub1;
    public $mub2;
    public $mcb;
    public $mcb1;
    public $mcb2;
    public $mbe;
    public $mbe1;
    public $mbe2;
    public $mhg;
    public $mhg1;
    public $mhg2;

    protected $rules =[
        'fecha'=> 'required',
        'Evaluador'=> 'required',
        'Almacen' => 'required',
    ];

    public function Guardar_Infor()
    {
      $datos = $this->validate();

      $this->Infor_ph = Infor_practicahg::create([
      'fecha' => $datos['fecha'],
      'solicitud' => 'Maquila',
      'evaluador' => $datos['Evaluador'],
       'almacen' => $datos['Almacen'],
        'estado' => 1
    ]);
    }

   function GuardarMaquila()
   {
      $this->validate([
        'Supervisor' => 'required',
        'Personal_Maquila' => 'required',
        'muc' => 'required',
        'muc1' => 'required',
        'muc2'=> 'required_if:muc,1|nullable',
        'mbl'  => 'required',
        'mbl1'=> 'required',
        'mbl2'=> 'required_if:mbl,1|nullable',
        'mcl'=> 'required',
        'mcl1'=> 'required',
        'mcl2'=> 'required_if:mcl,1|nullable',
        'mcp'=> 'required',
        'mcp1'=> 'required',
        'mcp2'=> 'required_if:mcp,1|nullable',
        'mna'=> 'required',
        'mna1'=> 'required',
        'mna2'=> 'required_if:mna,1|nullable',
        'mul'=> 'required',
        'mul1'=> 'required',
        'mul2'=> 'required_if:mul,1|nullable',
        'mnp'=> 'required',
        'mnp1'=> 'required',
        'mnp2'=> 'required_if:mnp,1|nullable',
        'mml'=> 'required',
        'mml1'=> 'required',
        'mml2'=> 'required_if:mml,1|nullable',
        'mnaa'=> 'required',
        'mnaa1'=> 'required',
        'mnaa2'=> 'required_if:mnaa,1|nullable',
        'mub'=> 'required',
        'mub1'=> 'required',
        'mub2'=> 'required_if:mub,1|nullable',
        'mcb'=> 'required',
        'mcb1'=> 'required',
        'mcb2'=> 'required_if:mcb,1|nullable',
        'mbe'=> 'required',
        'mbe1'=> 'required',
        'mbe2'=> 'required_if:mbe,1|nullable',
        'mhg'=> 'required',
        'mhg1'=> 'required',
        'mhg2'=> 'required_if:mhg,1|nullable',
      ]);

      $this->

   }

    public function render()
    {
        return view('livewire.higiene.formulario-higiene-maquila');
    }
}
