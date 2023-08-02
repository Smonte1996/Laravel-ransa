<?php

namespace App\Http\Livewire\Reclamo;

use Livewire\Component;
use App\Models\solicitude;
use App\Models\Investigacion;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Mail\notificacionCorreccion;
use App\Models\Evidencia_solicitude;
use Illuminate\Support\Facades\Mail;

class Correciones extends Component
{
    use WithFileUploads;

    public $solicitude;
    public $correccion;
    public $imagen;

    protected $rules = [
     
     'correccion' => 'required',  
     'imagen' => 'max:3024',

    ];

    public function render()
    {
        return view('livewire.reclamo.correciones');
    }

    public function mount($solicitud)
    {
        // $Investigacion = solicitude::find($solicitud);
        // if (!empty($Investigacion->investigacion->solicitude_id)) {
        //     abort(401);
        // } else {
        $this->solicitude = solicitude::find($solicitud);
        // }
    }

    public function RegistarCorrecion()
    {
        $datos = $this->validate();

        if (!is_null($this->imagen)) {
            foreach ($this->imagen as $image) {
            $image->store('public/Evidencia'); 
            $imagen_guardar = Evidencia_solicitude::create([
            'solicitude_id' => $this->solicitude->id,
            'name' => $image->hashName(),
        ]);
      }   
      }

        $notificacioncorreccion = Investigacion::create([
         'solicitude_id' => $this->solicitude->id,
         'correccion' => $datos['correccion'],
         'imagen' => $datos['imagen'],
        ]); 

        $affected = DB::table('solicitudes')
         ->where('id', $this->solicitude->id)
         ->update(['estado' => 5]);
        
        Mail::to([$this->solicitude->correo, "stevemontenegro_9@hotmail.com"])->send(New notificacionCorreccion($notificacioncorreccion));
        
        redirect()->route('adm.dashboard');
    }
}
