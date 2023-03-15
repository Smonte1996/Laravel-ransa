<?php

namespace App\Http\Livewire\Reclamo;

use App\Models\User;
use Livewire\Component;
use App\Models\solicitude;
use App\Models\Investigacion;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class ReclamoController extends Component
{


     public $solicitudes;

      public function mount()
      {
          $this->solicitudes = solicitude::all(); 
      }


    public function render()
    {

        return view('livewire.reclamo.index');
    }

    // public function download($id)
    // {
    //     $registro = solicitude::find($id);

    //    if (!$registro->investigacion->archivo) {
    //        return;
    //    }
    // //   if ($registro->investigacion->archivo == 'xlsx' || $registro->investigacion->archivo == 'xls') {

    //     $archivo = $registro->investigacion->archivo;

    // //  $pathToFile = storage_path('Reclamos/Analisis'.$archivo);

    //  return response()->download(storage_path('app/Reclamos/Analisis'.$archivo));
    // }
//    }
}
