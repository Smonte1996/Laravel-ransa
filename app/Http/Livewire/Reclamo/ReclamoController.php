<?php

namespace App\Http\Livewire\Reclamo;

use App\Exports\keyuserReclamoExport;
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
     public $valores;
     public $open = false;

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
            $this->emit('select2');
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

    function DescargarReclamo()
    {
       $valores = [2,3];
      return (new keyuserReclamoExport($valores))->download('Reclamo Cliente.xlsx');
    }

    public function ReclamoPdf($id)
    {
        $Solicitudes = solicitude::find(decrypt($id));

        $pdfs = PDF::loadView('pdf.informe_pdf', compact('Solicitudes'));

        return $pdfs->stream("$Solicitudes->codigo_generado.pdf");
    }
}
