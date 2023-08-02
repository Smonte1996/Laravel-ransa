<?php

namespace App\Http\Livewire\Reclamo;

use PDF;
use Livewire\Component;
use App\Models\Muestreo;
use App\Models\Data_logistica;
use App\Models\Evidencia_muestreo;

class MuestreoContenedor extends Component
{
    public $Muestreos;
    public $pdf;

    public function mount()
    {
        $this->Muestreos = Muestreo::where('estado', 2)->get();
    }

    public function Generarpdf($id)
    {
        $pdf = Muestreo::find($id);
        
        $pdfs = PDF::loadView('pdf.informe_pdf', compact('pdf'));
        
        return $pdfs->stream('muestreo-contenedor.pdf');
       
    }

    public function GenerarpdfHorizontal($id)
    {
        $pdf = Muestreo::find($id);
        // $imagenes = Evidencia_muestreo::find($id);
        
        $pdfs = PDF::loadView('pdf.informeHorizontal', compact('pdf'));
        
        return $pdfs->setPaper('a4','landscape')->stream(strtoupper("$pdf->contenedor.pdf"));
    }

    public function render()
    {
        return view('livewire.reclamo.muestreo-contenedor');
    }
}
