<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificacionOperacionMaquila extends Mailable
{
    use Queueable, SerializesModels;

    public $operacion;
    public $consultas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->operacion = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->consultas = Cabecera::find($this->operacion);

        $email = $this->markdown('mail.notificacionoperacionmaquila')->subject('Guia # '.$this->consultas->GuiaMaquilas->n_guia.'-Guia de entrega'.$this->consultas->codigo);

        return $email;
    }
}
