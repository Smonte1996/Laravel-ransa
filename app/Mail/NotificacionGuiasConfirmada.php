<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use PDF;

class NotificacionGuiasConfirmada extends Mailable
{
    use Queueable, SerializesModels;

    public $guias;

    public $consultas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
       $this->guias = $id;
    }

      /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->consultas = Cabecera::find($this->guias);

        $pdf = $this->consultas;

        $pdfs = PDF::loadView('pdf.GuiaRemicion_operacion', compact('pdf'));

        $email = $this->markdown('mail.notificacionGuiasConfirmada')->subject('Guia# '.$this->consultas->GuiaMaquilas->n_guia.' - Solicitud de la orden '.$this->consultas->codigo);

        $email->attachData($pdfs->output(),strtoupper("{$pdf->GuiaMaquilas->n_guia}.pdf"));

        return $email;
    }
}
