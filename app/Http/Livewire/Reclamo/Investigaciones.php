<?php

namespace App\Http\Livewire\Reclamo;

use App\Mail\notificacionactividades;
use App\Mail\notificacioninvestigacion;
use App\Mail\notificacionresponsableacciones;
use App\Models\User;
use App\Models\Accion;
use Livewire\Component;
use App\Models\solicitude;
use App\Models\Clasificacion;
use App\Models\Employee;
use App\Models\Investigacion;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Doctrine\Inflector\Rules\English\Rules;
use PhpParser\Node\Expr\New_;
use Symfony\Contracts\Service\Attribute\Required;

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
    public $fieldsCount = 1;
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
    
    // public $acciones;
    // public $responsable;
    // public $fecha_programada;
    
    protected $rules = [
     'correccion'=> 'required',
     'causa_raiz' => 'required',
     'evaluacion' => 'required',
     'Responsable' => 'required',
     'fechaprog' => 'required',
     'archivo' => 'required', 
    //  'acciones' => 'required',
    //  'responsable' => 'required',
    //  'fecha_programada' => 'required',

    ];    

    
  
    public function mount($solicitud)
    {   
            $Investigacion = solicitude::find($solicitud);
        if (!empty($Investigacion->investigacion->solicitude_id)) {
            abort(401);
        } else {
         $this->empleado = Employee::where('position_id', 3)->get();
        // $this->empleado = User::with('Employee')->whereHas('Employee', function($query){
        //    $query->Where('position_id', 3);  
        // })->get();
        $this->Empleados = Employee::with('users')->whereIn('position_id', [1,2])->get();
        $this->clasificacion = $solicitud;
        $this->solicitude = solicitude::find($solicitud);
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
    public function removeField($index)
    {
        unset($this->inputs[$index]);
        
    }

    public function ResgistroAnalisis()
    {
        $datos = $this->validate();
        // $validatedData = $this->validate([
        //     'inputs.*.acciones' => 'required',
        //     'inputs.*.responsable' => 'required',
        //     'inputs.*.fecha_programada' => 'required',
        // ]);

         $archivo = $this->archivo->store('public/Reclamos/Analisis');
         $datos['archivo'] = str_replace('public/Reclamos/Analisis/', ' ', $archivo);

         $notificacionInvestigacion = Investigacion::create([
         'solicitude_id' => $this->clasificacion, 
         'employee_id'=> $datos['Responsable'],
         'correccion'=> $datos['correccion'],
         'causa_raiz' =>$datos['causa_raiz'],
         'evaluacion_eficacia' => $datos['evaluacion'],
         'fecha_programada' => $datos['fechaprog'],
         'archivo' => $datos['archivo'],
         
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
         $affected = DB::table('solicitudes')
         ->where('id', $this->clasificacion)
         ->update(['estado' => 3]);

         
         Mail::to([$this->solicitude->correo,"stevemontenegro_9@hotmail.com"])->send(New notificacioninvestigacion($this->solicitude));
         Mail::to([$this->solicitude->investigacion->Empleados->users[0]->email ,"stevemontenegro_9@hotmail.com"])->send(new notificacionresponsableacciones($this->solicitude));
         foreach ($this->solicitude->acciones as  $accion ) {
         Mail::to([$accion->Empleado->users[0]->email ,"stevemontenegro_9@hotmail.com"])->send(new notificacionactividades($this->solicitude));
         }
        
         redirect()->route('adm.dashboard');
    
    }

    public function render()
    {
        return view('livewire.reclamo.investigacion');
    }
}
