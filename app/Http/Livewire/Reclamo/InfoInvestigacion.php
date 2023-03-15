<?php

namespace App\Http\Livewire\Reclamo;

use Livewire\Component;
use App\Models\Clasificacion;
use App\Models\solicitude;

class InfoInvestigacion extends Component
{
    public $solicitude;
    public $clasificacion;
    public $clasificaciones;
    
    public function render()
    {
        return view('livewire.reclamo.info-investigacion');
    }
     public function mount($clasificacion)
     {
        //  $this->clasificaciones = Clasificacion::find($clasificacion);
        //  $this->clasificacion = Clasificacion::findOrFail($clasificacion,'solicitude_id');
        $this->solicitude = solicitude::find($clasificacion);
     }
}
