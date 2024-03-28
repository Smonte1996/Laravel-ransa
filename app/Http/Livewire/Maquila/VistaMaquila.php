<?php

namespace App\Http\Livewire\Maquila;

use App\Mail\NotificacionGuiasAvances;
use App\Mail\NotificacionInformeClienteMaquila;
use App\Mail\NotificacionMaquila;
use App\Models\Avance_produccione;
use App\Models\Cabecera;
use App\Models\Guia_remicion;
use App\Models\Maquila_muestreo;
use App\Models\Maquila_novedades;
use App\Models\Maquila_producctividade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

    public  $guias;
    public $datosguias;
    public $Programacion;
    public $Sku;
    public $canti;
    public $empaque;
    public $estado;
    public $observacion;
    public $imagenes;
    public $imagenkey;
    public $total;


    public $Inf;
    public $hora_Inicio;
    public $hora_pausa;
    public $personas1;
    public $hora_reinicio;
    public $Hora_fin;
    public $personal2;
    public $avance1;
    public $avance2;

//    variables de muestreo
    public $empaque1;
    public $cantidad_muestra;
    public $cantidad_aceptada;
    public $empaque2;
    public $cantidad_rechazo;
    public $empaque3;
    public $ObserRechazo;
    public $cantidad_reprocesado;
    public $empaque4;

    protected $rules = [
        'hora_Inicio'=> 'required',
        'hora_pausa'=> 'required',
        'personas1'=> 'required',
        'hora_reinicio'=> 'required',
        'Hora_fin'=> 'required',
        'personal2'=> 'required',
        'avance1'=> 'required',
        'avance2'=>  'required',
    ];

    public function CamposAvances()
    {
        $this->Avances[] =
        [
            'cantidades' => '',
            'cjun' => '',
            // 'lotes' => '',
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
        $this->guias = Guia_remicion::generate_unique_guia(5);
         $this->datosguias = Guia_remicion::create([
         'cabecera_id' => $this->Inf->id,
         'n_guia' => $this->guias,
         'estado' => 0,
        ]);

        foreach ($this->Avances as $Avance) {
         $Guardar = Avance_produccione::create([
            'cabecera_id' => $this->Inf->id,
            'guia_remicion_id' => $this->datosguias->id,
            'programacione_id' => $this->Programacion,
            'unidades_caja' => $Avance['cjun'],
            'cantidad_avance' => $Avance['cantidades'],
            'fecha_vencimiento' => $Avance['fecha'],
            // 'lote' => $Avance['lotes']
         ]);
        }
        $this->emit('mensaje', 'Se Guardo exitosamente');
    }

    public function GuardarProductividad()
    {
        $CamposProductividad = $this->validate();

        $Guardarhoras = Maquila_producctividade::create([
            'cabecera_id'=> $this->Inf->id,
            'programacione_id' => $this->Programacion,
            'hora_inicio' =>$CamposProductividad['hora_Inicio'],
            'hora_pausa' =>$CamposProductividad['hora_pausa'],
            'n_persona_1' =>$CamposProductividad['personas1'],
            'avance1' => $CamposProductividad['avance1'],
            'hora_reinicio' =>$CamposProductividad['hora_reinicio'],
            'hora_fin'=>$CamposProductividad['Hora_fin'],
            'n_persona_2' =>$CamposProductividad['personal2'],
            'avance2' => $CamposProductividad['avance2'],
        ]);

        $this->emit('mensaje', 'Se Guardo exitosamente');
    }

    public function GuardarMuestreo()
    {
        $camposMuestro = $this->validate([
            'empaque1'=> 'nullable',
            'cantidad_muestra' => 'nullable',
            'cantidad_aceptada' => 'nullable',
            'empaque2' => 'nullable',
            'cantidad_rechazo' => 'nullable',
            'empaque3' => 'nullable',
            'ObserRechazo' => 'nullable',
            'cantidad_reprocesado' => 'nullable',
            'empaque4' => 'nullable'

        ]);

        $guardarMuestreo = Maquila_muestreo::create([
         'cabecera_id'=> $this->Inf->id,
         'programacione_id' => $this->Programacion,
         'cantidad_muestra' => $camposMuestro['cantidad_muestra'],
         'cj_un_muestra' => $camposMuestro['empaque1'],
         'cantidad_aceptado' => $camposMuestro['cantidad_aceptada'],
         'cj_un_aceptado' => $camposMuestro['empaque2'],
         'cantidad_rechazado'=> $camposMuestro['cantidad_rechazo'],
         'cj_un_rechazado'=> $camposMuestro['empaque3'],
         'obervacion_rechazado'=> $camposMuestro['ObserRechazo'],
         'cantidad_reprocesado'=> $camposMuestro['cantidad_reprocesado'],
         'cj_un_reprocesado' => $camposMuestro['empaque4'],
        ]);

        $this->emit('mensaje', 'Se Guardo exitosamente');
    }

    public function GuardarNovedad()
    {
        // foreach ($this->Novedades as $Novedad) {
            if (!is_null($this->imagenes)) {
            //   foreach ($this->Novedades as $Imag) {
             $imagen = $this->imagenes->store('public/NovedadMaquila');
              $imagene = str_replace('public/NovedadMaquila/','', $imagen);
            //   }
            };
            $guardar = Maquila_novedades::create([
            'cabecera_id' => $this->Inf->id,
            'programacione_id' => $this->Programacion,
             'sku' => $this->Sku,
             'cantidad' => $this->canti,
             'caj_uni' => $this->empaque,
             'estado' => $this->estado,
             'observacion' => $this->observacion,
             'imagen'=> $imagene
        ]);
        // }

        $this->reset('Sku','canti', 'empaque', 'estado', 'observacion', 'imagenes');

        $this->imagenkey = rand();

        $this->emit('mensaje', 'Se Guardo exitosamente');
    }

    function EnviarYregistarguia()
    {
        //  $this->guias = Guia_remicion::generate_unique_guia(5);
        //  $this->datosguias = Guia_remicion::create([
        //  'cabecera_id' => $this->Inf->id,
        //  'n_guia' => $this->guias,
        //  'estado' => 4,
        // ]);
     $consultar = Cabecera::find($this->Inf->id);
     $valor1 = $consultar->cantidad;
     foreach ($consultar->AvancesMaquila as  $value) {
        $valor2[] = $value->Cantidad_avance;
     }
    //  dd($valor1, array_sum($valor2));
     if ($valor1 == array_sum($valor2)) {
        $actu = DB::table('guia_remicions')
         ->where('id',$this->datosguias->id)
         ->update(['estado' => 5,
           'user_id_confirmar' => auth()->user()->id]);

        $actucabe = DB::table('cabeceras')
         ->where('id', $this->Inf->id)
         ->update(['estado' => 5]);

         Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionInformeClienteMaquila($this->Inf->id));
         Mail::to('stevenmontorres96@gmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionGuiasAvances($this->Inf->id));

         $this->emit('mensaje', 'Enviado sastifactoriamente');

         return redirect()->route('adm.vista.Maquila.index');
     } else {
        $actu = DB::table('guia_remicions')
        ->where('id',$this->datosguias->id)
        ->update(['estado' => 4 ,
          'user_id_confirmar' => auth()->user()->id]);

          $actucabe = DB::table('cabeceras')
          ->where('id', $this->Inf->id)
          ->update(['estado' => 4]);

          Mail::to('stevemontenegro_9@hotmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionInformeClienteMaquila($this->Inf->id));
          Mail::to('stevenmontorres96@gmail.com')->cc('smontenegrot@ransa.net')->send(new NotificacionGuiasAvances($this->Inf->id));

          $this->emit('mensaje', 'Enviado sastifactoriamente');

          return redirect()->route('adm.vista.Maquila.index');
     }

    }

    public function render()
    {
        // dd($this->Programacion);
        if (isset($this->Programacion)) {
        $ValorPrevio = Avance_produccione::where('cabecera_id', $this->Inf->id)->where('programacione_id', $this->Programacion)->get();
        foreach ($ValorPrevio as $value) {
         $dias = $value->Avanceactividad->cantidad;
         $valor[] = $value->Cantidad_avance;
        }
        // dd($valor);
        $this->total = (array_sum($valor) - $dias);
        // dd($this->total);
        } else {
            # code...
        }

        return view('livewire.maquila.vista-maquila');
    }
}
