<?php

namespace App\Http\Livewire\Reclamo;

use App\Models\User;
use Livewire\Component;
use App\Models\solicitude;
use PDF;
use App\Models\Investigacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;


class ReclamoController extends Component
{


     public $solicitudes;
     public $date;
     public $estado;

      public function mount()
      {
          $this->solicitudes = solicitude::all();

        //   $this->date = Carbon::parse($this->solicitudes->fecha_registro);
        //   dd($this->date);
        //   return today()->diffInDays($this->date);
      }


    public function render()
    {
         if (empty($this->estado)) {
             $solicitudes = Solicitude::where('estado', $this->estado)->get();
            }else{
            $solicitudes = Solicitude::where('estado', $this->estado)->get();
         //    dd($this->estado);
            }
        return view('livewire.reclamo.index');
    }

     public function download($id)
     {
         $registro = solicitude::find($id);

             if (!$registro->investigacion->archivo) {
                  return;
              }
                 $archivo = $registro->investigacion->archivo;

            return response()->download(storage_path('app/public/Reclamos/Analisis/'.trim($archivo)));
    }

    public function ReclamoPdf($id)
    {
        $Solicitudes = solicitude::find($id);

        $pdfs = PDF::loadView('pdf.informe_pdf', compact('Solicitudes'));

        return $pdfs->stream("$Solicitudes->codigo_generado.pdf");
    }
}
