<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificacionConfirmacionMaquila extends Mailable
{
    use Queueable, SerializesModels;

    public $ids;

    public $consultar;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
       $this->ids = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->consultar = Cabecera::find($this->ids);

        $email = $this->markdown('mail.notificacionConfirmacionMaquila')->subject('Guia# '.$this->consultar->GuiaMaquilas->n_guia.' - Solicitud de la orden '.$this->consultar->codigo);

        return $email;
    }
}
