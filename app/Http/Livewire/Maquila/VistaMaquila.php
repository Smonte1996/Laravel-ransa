<?php

namespace App\Http\Livewire\Maquila;

use App\Models\Avance_produccione;
use App\Models\Cabecera;
use App\Models\Maquila_producctividade;
use Livewire\Component;
use Livewire\WithFileUploads;

class VistaMaquila extends Component
{
    use WithFileUploads;

    public $Avances = [
        [
         'cantidades' => '',
         'cjun' => '',
         'lotes' => '',
         'fecha' => '',
         ]
    ];

    public $Novedades = [
        [
            'Sku' => '',
            'canti' => '',
            'empaque' => '',
            'estado' => '',
            'observacion' => '',
            'imagenes' => '',
        ]
    ];

    public $Inf;
    public $hora_Inicio;
    public $hora_pausa;
    public $personas1;
    public $hora_reinicio;
    public $Hora_fin;
    public $personal2;

    protected $rules = [
        'hora_Inicio'=> 'required',
        'hora_pausa'=> 'required',
        'personas1'=> 'required',
        'hora_reinicio'=> 'required',
        'Hora_fin'=> 'required',
        'personal2'=> 'required',
    ];

    public function CamposAvances()
    {
        $this->Avances[] =
        [
            'cantidades' => '',
            'cjun' => '',
            'lotes' => '',
            'fecha' => '',
        ];
    }
    public function QuitarCampos($index)
    {
        unset($this->Avances[$index]);
    }

    public function EliminarCampo($index)
    {
        unset($this->Novedades[$index]);
    }

    public function CamposNovedad()
    {
       $this->Novedades[]=
       [
            'Sku' => '',
            'canti' => '',
            'empaque' => '',
            'estado' => '',
            'observacion' => '',
            'imagenes' => '',
       ];
    }

    public function mount($id)
    {
        $this->Inf = Cabecera::find(decrypt($id));
    }

    public function GuardarAvance()
    {
        foreach ($this->Avances as $Avance) {
         $Guardar = Avance_produccione::create([
            'cabecera_id' => $this->Inf->id,
            'unidades_caja' => $Avance['cjun'],
            'cantidad_avance' => $Avance['cantidades'],
            'fecha_vencimiento' => $Avance['fecha'],
            'lote' => $Avance['lotes']
         ]);
        }

        $this->emit('mensaje', 'Se Guardo exitosamente');
    }

    public function GuardarProductividad()
    {
        $CamposProductividad = $this->validate();

        $Guardarhoras = Maquila_producctividade::create([
            'cabecera_id'=> $this->Inf->id,
            'hora_inicio' =>$CamposProductividad['hora_Inicio'],
            'hora_pausa' =>$CamposProductividad['hora_pausa'],
            'n_persona_1' =>$CamposProductividad['personas1'],
            'hora_reinicio' =>$CamposProductividad['hora_reinicio'],
            'hora_fin'=>$CamposProductividad['Hora_fin'],
            'n_persona_2' =>$CamposProductividad['personal2']
        ]);

        $this->emit('mensaje', 'Se Guardo exitosamente');
    }

    public function render()
    {
        return view('livewire.maquila.vista-maquila');
    }
}
