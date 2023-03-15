<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionRespuestacliente extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionE;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificacionEncuesta)
    {
        //
        $this->notificacionE = $notificacionEncuesta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionE)->last();
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacionRespuesta')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $email;
    }
}
