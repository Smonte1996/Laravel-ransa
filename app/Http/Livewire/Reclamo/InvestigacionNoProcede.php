<?php

namespace App\Http\Livewire\Reclamo;

use App\Mail\notificacionNoProcede;
use Livewire\Component;
use App\Models\solicitude;
use App\Models\Evidencia_solicitude;
use App\Models\Investigacion;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvestigacionNoProcede extends Component
{
    use WithFileUploads;

    public $clasificacion;
    public $solicitude;
    public $clasificaciones;
    public $argumento;
    public $archivo;
    public $imagen;

    protected $rules = [
     'argumento' => 'required',
     'archivo' => 'required',
     'imagen' => 'max:3024',
    ];

    public function render()
    {
        return view('livewire.reclamo.investigacion-no-procede');
    }

    public function mount($clasificacion)
    {
        $Investigacion = solicitude::find($clasificacion);
        if (!empty($Investigacion->investigacion->solicitude_id)) {
            abort(401);
        } else {
        $this->solicitude = solicitude::find($clasificacion);
        }
    }

    public function Registarargumento()
    {
        $datos = $this->validate();
        
        if (!is_null($this->imagen)) {
            foreach ($this->imagen as $image) {
            $image->store('public/Evidencia');
            // $image = str_replace('public/Evidencia', ' ', $image); 
            $imagen_guardar = Evidencia_solicitude::create([
            'solicitude_id' => $this->solicitude->id,
            'name' => $image->hashName(),
        ]);
    }   
     }
        $archivo = $this->archivo->store('public/Reclamos/Analisis');
        $datos['archivo'] = str_replace('public/Reclamos/Analisis/', ' ', $archivo);

        $notificacioninvestigacionnoprocede = Investigacion::create([
        'solicitude_id' => $this->solicitude->id,
        'argumento' => $datos['argumento'], 
        'archivo' => $datos['archivo'] 
        ]);

        $affected = DB::table('solicitudes')
         ->where('id', $this->solicitude->id)
         ->update(['estado' => 5]);
      
        Mail::to([$this->solicitude->correo, "stevemontenegro_9@hotmail.com"])->send(New notificacionNoProcede($notificacioninvestigacionnoprocede));
         redirect()->route('adm.dashboard');

    }
}
