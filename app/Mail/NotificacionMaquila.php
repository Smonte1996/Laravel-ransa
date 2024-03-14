<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use PDF;

class NotificacionMaquila extends Mailable
{
    use Queueable, SerializesModels;

     public $Maquila;
     public $consultar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->Maquila = $id;
    }

   /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->consultar = Cabecera::find($this->Maquila);

          $email = $this->markdown('mail.notificacionMaquila')->subject('Solicitud de Ot '.$this->consultar->codigo.'- Guia # '.$this->consultar->GuiaMaquilas->n_guia);

        return $email;
    }
}
