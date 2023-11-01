<?php

namespace App\Http\Livewire\Higiene;

use App\Models\Infor_practicahg;
use App\Models\Practica_proveedore;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FormularioHigieneProveedor extends Component
{
    public $Supervisores;
    public $supervisores;
    public $Proveedor;
    public $Personal;
    public $fecha;
    public $Evaluador;
    public $Almacen;
    public $Infor_ph;
    public $puc = '';
    public $puc1;
    public $puc2;
    public $puc3;
    public $pbl = '';
    public $pbl1;
    public $pbl2;
    public $pbl3;
    public $pcl = '';
    public $pcl1;
    public $pcl2;
    public $pcl3;
    public $pcp1;
    public $pcp2;
    public $pcp3;
    public $pcp = '';
    public $pna = '';
    public $pna1;
    public $pna2;
    public $pna3;
    public $pul = '';
    public $pul1;
    public $pul2;
    public $pul3;
    public $Practica_Provvedor;


    protected $rules =[
        'fecha'=> 'required',
        'Evaluador'=> 'required',
        'Almacen' => 'required',
    ];

    public function GuardarInfor()
    {
      $datos = $this->validate();

      $this->Infor_ph = Infor_practicahg::create([
      'fecha' => $datos['fecha'],
      'solicitud' => 'Proveedor',
      'evaluador' => $datos['Evaluador'],
       'almacen' => $datos['Almacen'],
        'estado' => 1
    ]);
    }

    public function render()
    {
        return view('livewire.higiene.formulario-higiene-proveedor');
    }

    function GuardarProveedor()
    {
        $dato2 = $this->validate([
            'Supervisores' => 'required',
            'Personal' => 'required',
            'Proveedor' => 'required',
            'puc' => 'required',
            'puc1'=>  'required_if:uc,0,1|nullable',
            'puc2'=>  'required_if:uc,0,1|nullable',
            'pbl'=> 'required',
            'pbl1'=>  'required_if:bl,0,1|nullable',
            'pbl2'=>  'required_if:bl,0,1|nullable',
            'pcl'=> 'required',
            'pcl1'=>  'required_if:cl,0,1|nullable',
            'pcl2'=>  'required_if:cl,0,1|nullable',
            'pna'=> 'required',
            'pna1'=> 'required_if:na,0,1|nullable',
            'pna2'=> 'required_if:na,0,1|nullable',
            'pcp'=> 'required',
            'pcp1'=> 'required_if:cp,0,1|nullable',
            'pcp2'=> 'required_if:cp,0,1|nullable',
            'pul' => 'required',
            'pul1'=> 'required_if:ul,0,1|nullable',
            'pul2'=> 'required_if:ul,0,1|nullable',
           ]);

        $this->Practica_Provvedor = Practica_proveedore::create([
            'infor_practicahg_id' => $this->Infor_ph->id,
            'user_id'=> $dato2['Supervisores'],
            'personal' => $dato2['Personal'],
            'proveedor' => $dato2['Proveedor'],
            'puc' => $dato2['puc' ],
            'puc1' => $dato2['puc1'],
            'puc2' => $dato2['puc2'],
            'pbl' => $dato2['pbl' ],
            'pbl1'=> $dato2['pbl1'],
            'pbl2'=> $dato2['pbl2'],
            'pcl' => $dato2['pcl' ],
            'pcl1'=> $dato2['pcl1'],
            'pcl2'=> $dato2['pcl2'],
            'pna' => $dato2['pna' ],
            'pna1'=> $dato2['pna1'],
            'pna2'=> $dato2['pna2'],
            'pcp' => $dato2['pcp' ],
            'pcp1'=> $dato2['pcp1'],
            'pcp2'=> $dato2['pcp2'],
            'pul' => $dato2['pul' ],
            'pul1'=> $dato2['pul1'],
            'pul2'=> $dato2['pul2'],
        ]);

        $this->reset('Proveedor','Personal','puc','puc1','puc2','pbl','pbl1','pbl2','pcl','pcl1','pcl2','pna','pna1','pna2','pcp','pcp1','pcp2','pul','pul1','pul2');
    }

    function mount()
    {
        $this->supervisores = User::with('Employee')->whereHas('Employee', function($query){
            $query->WhereIn('position_id', [5,6])->where('warehouse_id', 1);
         })->get();
    }

    function Enviar()
    {
        $hgs = DB::table('infor_practicahgs')
       ->where('id', $this->Infor_ph->id)
       ->update(['estado' => 2]);

       return redirect()->route('adm.practica.Proveedor');

       $this->emit('alert','Muchas gracias, nuestro equipo ya recibió tu solicitud. Pronto te enviaremos una respuesta');
    }
}
