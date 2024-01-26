<?php

namespace App\Http\Livewire\Guest;

use App\Mail\notificacionRespuestacliente;
use App\Models\Calificacion;
use App\Models\solicitude;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class EncuestaCliente extends Component
{
     public $General = null;
     public $Atencion;
     public $Rapidez;
     public $solucion;
     public $errorMessage;
     public $ob1;
     public $ob2;
     public $ob3;
     public $ob4;
     public $solicitude;

     protected $rules = [
      'General' => 'required',
      'Atencion' => 'required',
      'Rapidez' => 'required',
      'solucion' => 'required',
     ];

    public function render()
    {

        return view('livewire.guest.encuesta-cliente')->layout('layouts.guest2');

    }

    public function mount($solicitude)
    {
        $calificacion = solicitude::find(decrypt($solicitude));
        if (!empty($calificacion->encuesta->p1)) {
            abort(401);
        } else {
         $this->solicitude = decrypt($solicitude);
         }
    }

    public function saveData()
    {

        if (empty($this->General) || empty($this->Atencion) || empty($this->Rapidez) || empty($this->solucion)) {
            $this->errorMessage = 'Los campos son obligatorios.';
            return;
        }

        $notificacionEncuesta = Calificacion::create([
         'solicitude_id' => $this->solicitude,
         'p1' => $this->General,
         'ob1' => $this->ob1,
         'p2' => $this->Atencion,
         'ob2' => $this->ob2,
         'p3' => $this->Rapidez,
         'ob3' => $this->ob3,
         'p4' => $this->solucion,
         'ob4' => $this->ob4,

        ]);

        Mail::to(['stevemontenegro_9@hotmail.com','smontenegrot@ransa.net'])->send(new notificacionRespuestacliente($notificacionEncuesta));

        return redirect()->route('reclamo.visita');
    }

}
