<?php

namespace App\Http\Livewire\Reclamo;

use App\Mail\notificacionactividades;
use App\Mail\notificacioninvestigacion;
use App\Mail\notificacionresponsableacciones;
use App\Models\User;
use App\Models\Accion;
use App\Models\Analisis_efecto;
use App\Models\Causa_ishikawa;
use Livewire\Component;
use App\Models\solicitude;
use App\Models\Employee;
use App\Models\Investigacion;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
class Investigaciones extends Component
{

    use WithFileUploads;

    public $inputs =[
        [
        'acciones' => '',
         'responsable' => '',
         'fecha_programada' => '',
         ]
    ];

    public $campos =[
        [
            'porqueone' => '',
            'porquetwo' => '',
            'porquethree' => '',
            'porquefour' => '',
            'porquefive' => '',
         ]
    ];

    public $campo =[
      [
        'categoria' => '',
        'causa' => '',
      ]
    ];
    public $users;
    public $correccion;
    public $causa_raiz;
    public $clasificacion;
    public $evaluacion;
    public $Responsable;
    public $fechaprog;
    public $archivo;
    public $solicitude;
    public $empleado;
    public $Empleados;


    protected $rules = [
     'correccion'=> 'required',
     'causa_raiz' => 'required',
     'evaluacion' => 'required',
     'Responsable' => 'required',
     'fechaprog' => 'required',
    //  'acciones' => 'required',
    //  'responsable' => 'required',
    //  'fecha_programada' => 'required',

    ];



    public function mount($solicitud)
    {

        $isEncrypted = preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$/', $solicitud);
        // dd(decrypt($solicitud));
        if (!is_numeric($solicitud)) {
            // dd(decrypt($solicitud));
            $Investigacion = solicitude::find(decrypt($solicitud));
            // dd($Investigacion);
        } else {
            $Investigacion = solicitude::find($solicitud);
        }
         if (!empty($Investigacion->investigacion->solicitude_id)) {
             abort(401);
         } else {
         $this->empleado = Employee::whereIn('position_id', [3,2])->get();
        //  $this->empleado = User::with('Employee')->whereHas('Employee', function($query){
        //     $query->Where('position_id', 3);
        //  })->get();
        $this->Empleados = Employee::with('users')->whereIn('position_id', [3])->get();
        if (!is_numeric($solicitud)) {
            $this->clasificacion = decrypt($solicitud);
            $this->solicitude = solicitude::find(decrypt($solicitud));
            // dd($this->solicitude);
        } else {
            $this->clasificacion = $solicitud;
            $this->solicitude = solicitude::find($solicitud);
        }

        }
    }
    public function addField()
    {

        $this->inputs[] =
        [
            'acciones' => '',
             'responsable' => '',
             'fecha_programada' => '',
        ];
    }
    public function agregarcampos()
    {
        $this->campos[] =
        [
            'porqueone' => '',
            'porquetwo' => '',
            'porquethree' => '',
            'porquefour' => '',
            'porquefive' => '',
        ];
    }
    public function Añadircampos()
    {
        $this->campo[] =
        [
            'categoria' => '',
            'causa' => '',
        ];
    }

    public function Deshasercampo($inicio)
    {
        unset($this->campo[$inicio]);
    }

    public function QuitarCampos($indexs)
    {
        unset($this->campos[$indexs]);

    }

    public function removeField($index)
    {
        unset($this->inputs[$index]);

    }

    public function ResgistroAnalisis()
    {
        $datos = $this->validate();

        //  $archivo = $this->archivo->store('public/Reclamos/Analisis');
        //  $datos['archivo'] = str_replace('public/Reclamos/Analisis/', ' ', $archivo);

         $notificacionInvestigacion = Investigacion::create([
         'solicitude_id' => $this->clasificacion,
         'employee_id'=> $datos['Responsable'],
         'correccion'=> $datos['correccion'],
         'causa_raiz' =>$datos['causa_raiz'],
         'evaluacion_eficacia' => $datos['evaluacion'],
         'fecha_programada' => $datos['fechaprog'],
        //  'archivo' => $datos['archivo'],

        //  'codigo_generado' => $this->clasificacion->codigo_generado,
        ]);
          foreach ($this->inputs as $input) {
         $notificacionAcciones = Accion::create([
          'solicitude_id' => $this->clasificacion,
          'name' => $input['acciones'],
          'employee_id' => $input['responsable'],
          'fecha_programacion' => $input['fecha_programada'],
         ]);
         }

         foreach ($this->campos as $campo) {
           $guardarefecto = Analisis_efecto::create([
            'solicitude_id' => $this->clasificacion,
            'porque1' => $campo['porqueone'],
            'porque2' => $campo['porquetwo'],
            'porque3' => $campo['porquethree'],
            'porque4' => $campo['porquefour'],
            'porque5' => $campo['porquefive'],
           ]);
         }

         foreach ($this->campo as $camp) {
            $guardarcausa = Causa_ishikawa::create([
                'solicitude_id' => $this->clasificacion,
                'categoria' => $camp['categoria'],
                'causa' => $camp['causa'],
               ]);
         }

         $affected = DB::table('solicitudes')
         ->where('id', $this->clasificacion)
         ->update(['estado' => 3]);
        //  $this->solicitude->investigacion->Empleados->users[0]->email ,
        // $accion->Empleado->users[0]->email ,
        //$this->solicitude->correo,
         Mail::to(["smontenegrot@ransa.net"])->send(New notificacioninvestigacion($this->solicitude));
         Mail::to(["stevemontenegro_9@hotmail.com"])->send(new notificacionresponsableacciones($this->solicitude));
        //  foreach ($this->solicitude->acciones as  $accion ) {
         Mail::to(["stevemontenegro_9@hotmail.com"])->send(new notificacionactividades($this->solicitude));
        //  }

         redirect()->route('adm.dashboard');

    }

    public function render()
    {
        return view('livewire.reclamo.investigacion');
    }
}
