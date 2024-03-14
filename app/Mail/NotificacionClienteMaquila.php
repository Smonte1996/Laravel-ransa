<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificacionClienteMaquila extends Mailable
{
    use Queueable, SerializesModels;

    public $Cliente;
    public $consulta;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
       $this->Cliente = $id;
    }

     /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->consulta = Cabecera::find($this->Cliente);

        $email = $this->markdown('mail.notificacionClienteMaquila')->subject('Solicitud de la orden '.$this->consulta->codigo.'- Guia # '.$this->consulta->GuiaMaquilas->n_guia);

        return $email;
    }
}
