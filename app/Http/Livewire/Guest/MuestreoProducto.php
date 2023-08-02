<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\Data_logistica;
use App\Models\Tamano_muestra;
use App\Models\Niveles_estandar;

class MuestreoProducto extends Component
{
   
   public $abrir = false;
    
    public function render()
    {

        return view('livewire.guest.muestreo-producto');
    }
}
