<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class NotificacionGuiasAvances extends Mailable
{
    use Queueable, SerializesModels;

    public $avances;
    public $consultar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
     $this->avances = $id;
    }

    public function build(){
        $this->consultar = Cabecera::find($this->avances);
        $Go = $this->consultar->Guias;
          $opdf = PDF::loadView('pdf.GuiaMaquilaOperacion', compact('Go'));
          $email = $this->markdown('mail.notificacionmaquilaoperacion')->subject('Guia # '.$this->consultar->Guias->n_guia.' Solicitud de la '.$this->consultar->codigo);
          $email->attachData($opdf->output(),strtoupper("Guias de Avances Guia# {$this->consultar->Guias->n_guia}.pdf"));
          return $email;
    }
}
