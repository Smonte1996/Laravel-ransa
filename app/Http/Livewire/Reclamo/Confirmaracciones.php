<?php

namespace App\Http\Livewire\Reclamo;

use Livewire\Component;
use App\Models\solicitude;
use App\Models\Investigacion;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Models\Evidencia_solicitude;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificacioncierreaccion;


class Confirmaracciones extends Component
{
    use WithFileUploads;

    public $solicitude;
    public $evaluacion_check = null;
    public $accion_check ;
    public $observacion ;
    public $imagen;
    public $errorMessage;

    protected $rules = [
     'accion_check' => 'required',
     'imagen'=> 'max:3024'
    ];

    public function render()
    {
        return view('livewire.reclamo.confirmaracciones');
    }
    public function mount($solicitude)
    {
         $solicitud = solicitude::find($solicitude);
      if (!empty($solicitud->investigacion->date_check)) {
        abort(401);
    } else {
        $this->solicitude = solicitude::find($solicitude);
       }
    }

    public function confirmarchekcData()
    {

      if (empty($this->evaluacion_check) || empty($this->observacion) || empty($this->accion_check)){
        $this->emit('show-sweetalert',[
          'type' => 'warning',
          'title' => 'Todos los campos son obligatorio',
          'message' => 'Por favor, llenar todo los campos.'
      ]);
      return;
    }

    //  $datos = $this->validate();

            if (!is_null($this->imagen)) {
              foreach ($this->imagen as $image) {
              $image->store('public/Evidencia'); 
              $imagen_guardar = Evidencia_solicitude::create([
              'solicitude_id' => $this->solicitude->id,
              'name' => $image->hashName(),
          ]);
        }   
        }

      $notificaraccione = DB::table('investigacions')
         ->where('solicitude_id', $this->solicitude->id)
         ->update([
         'cumplimiento' => $this->evaluacion_check,
         'date_check' => now(),
         'observacion' => $this->observacion,
         ]);

      $notificaracciones = DB::table('accions')
      ->where('solicitude_id', $this->solicitude->id)
      ->update(['date_check' => $this->accion_check ? now():null,]);

      $affected = DB::table('solicitudes')
       ->where('id', $this->solicitude->id)
       ->update(['estado' => 4]);

       Mail::to([$this->solicitude->correo, 'stevemontenegro_9@hotmail.com'])->send(new notificacioncierreaccion($this->solicitude));

      return redirect()->route('adm.dashboard');
    }
}
