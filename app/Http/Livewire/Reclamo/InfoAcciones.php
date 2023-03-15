<?php

namespace App\Http\Livewire\Reclamo;

use App\Mail\notificacionReapertura;
use App\Mail\notificacionReaperturaResponsable;
use App\Models\Accion;
use Livewire\Component;
use App\Models\solicitude;
use App\Models\Clasificacion;
use App\Models\Investigacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class InfoAcciones extends Component
{
    public $solicitude;
    public $clasificacion;
    public $investigacion;
    public $acciones;

    protected $listeners = ['Reapertura'];

    public function render()
    {
        return view('livewire.reclamo.info-acciones');
    }

    public function mount($solicitude)
    {
    // $this->clasificacion = Clasificacion::find($solicitude);
    $this->solicitude = solicitude::find($solicitude);
    }

    public function Reapertura($solicitude)
    {
         $Investigacion = solicitude::find($solicitude);
         if ($Investigacion) {
             $Investigacion->investigacion->delete();
         }
         if ($Investigacion) {
             $Investigacion->encuesta->delete();
         }
        $Investigacion = Accion::where('solicitude_id', $solicitude)->delete();
        
        $affected = DB::table('solicitudes')
       ->where('id', $this->solicitude->id)
       ->update(['estado' => 2]);

       Mail::to([$this->solicitude->clasificacion->users->email,'stevemontenegro_9@hotmail.com'])->send(New notificacionReaperturaResponsable($this->solicitude));
       Mail::to([$this->solicitude->correo ,"stevemontenegro_9@hotmail.com"])->send(new notificacionReapertura($this->solicitude));
     
       redirect()->route('adm.reclamo');

    }
}
