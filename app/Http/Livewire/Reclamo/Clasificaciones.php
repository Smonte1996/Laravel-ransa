<?php

namespace App\Http\Livewire\Reclamo;

use App\Mail\notificacionclasificacion;
use App\Mail\notificacionFelicidades;
use App\Mail\notificacionresponsable;
use App\Models\User;
use Livewire\Component;
use App\Models\Clasificacion;
use App\Models\Causal_general;
use App\Models\Detalle_causal;
use App\Models\Employee;
use App\Models\solicitude;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class Clasificaciones extends Component
{ 
     public $detallegeneral = null;
     public $causalgeneral = null;    
     public $detalles = null;
     public $Generals;
     public $detalle_causal_id;
     public $Investigador;
     public $solicitude;
     public $empleado;

     protected $rules = [
      'Investigador' => 'required',
      'causalgeneral' => ['nullable'],
      'detallegeneral' => ['nullable'],
     ];
     public function render()
     {   
         return view('livewire.reclamo.clasificaciones');

     }
     public function mount($solicitude)
     {
         $this->empleado = Employee::where('position_id', 3)->get();
          $this->Generals = Causal_general::all();
        $this->solicitude = solicitude::find($solicitude);
     }
   
      public function updatedcausalgeneral($causal_general_id)
      { 
         $this->detalles = Detalle_causal::where('causal_general_id', $causal_general_id)->get();
      }

      public function registroclasificacion()
      {
        $datos = $this->validate();

     $notificacionclasificacion = Clasificacion::create([
       'solicitude_id' => $this->solicitude->id,
       'employee_id' => $datos['Investigador'],
       'causal_general_id' => $datos['causalgeneral'],
       'detalle_causal_id' => $datos['detallegeneral'],
       'codigo_generado' => $this->solicitude->codigo_generado, 
       ]);
       $affected = DB::table('solicitudes')
       ->where('id', $this->solicitude->id)
       ->update(['estado' => 2]);

      Mail::to([$this->solicitude->clasificacion->Empleados->users[0]->email ,"stevemontenegro_9@hotmail.com"])->send(new notificacionresponsable($notificacionclasificacion));
      Mail::to([$this->solicitude->correo ,"stevemontenegro_9@hotmail.com"])->send(new notificacionclasificacion($notificacionclasificacion));

      redirect()->route('adm.reclamo');
     }

     public function felicitacion()
     {
      $datos = $this->validate();

      $notificacionfelicitacion = Clasificacion::create([
      'solicitude_id' => $this->solicitude->id,
      'employee_id' => $datos['Investigador'],
      'codigo_generado' => $this->solicitude->codigo_generado, 
      ]);
      $affected = DB::table('solicitudes')
       ->where('id', $this->solicitude->id)
       ->update(['estado' => 5]);

       Mail::to([$this->solicitude->correo, $this->solicitude->clasificacion->Empleados->users[0]->email])->send(new notificacionFelicidades($notificacionfelicitacion));

       redirect()->route('adm.reclamo');
     }
}
