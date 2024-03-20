<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class NotificacionGuiasCompleta extends Mailable
{
    use Queueable, SerializesModels;

   public $completa;
   public $consultar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->completa = $id;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->consultar = Cabecera::find($this->completa);

        $pdf = $this->consultar;

        $pdfs = PDF::loadView('pdf.GuiaRemicion_operacion', compact('pdf'));

        $email = $this->markdown('mail.notificacionGuiasConfirmada')->subject('Guia# '.$this->consultar->GuiaMaquilas->n_guia.' - Solicitud de la orden '.$this->consultar->codigo);

        $email->attachData($pdfs->output(),strtoupper("{$pdf->GuiaMaquilas->n_guia}.pdf"));

        return $email;

    }
}
