<?php

namespace App\Mail;

use App\Models\Muestreo;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificacionInforme extends Mailable
{
    use Queueable, SerializesModels;

    public $Mustreo;
    public $pdf;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Muestreos)
    {
        //
        $this->Mustreo = $Muestreos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = Muestreo::find($this->Mustreo->id);
        
        $pdfs = PDF::loadView('pdf.informeHorizontal', compact('pdf'));

        $pdfv = PDF::loadView('pdf.informeVertical', compact('pdf'));

       $email = $this->markdown('mail.notificacionInforme')->subject('Recepción '.strtoupper($this->Mustreo->contenedor));
      
       $email->attachData($pdfs->setPaper('a4','landscape')->output(),"Reporte {$pdf->contenedor}.pdf");

       $email->attachData($pdfv->output(),strtoupper("Reporte-Transporte.pdf"));
       
       return $email;
    }
}
