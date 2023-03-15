<?php

namespace App\Mail;

use App\Models\solicitude;
use App\Models\Clasificacion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionresponsable extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionCR;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificacionclasificacion)
    {
        //
        $this->notificacionCR = $notificacionclasificacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionCR)->last();
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);

        $email =  $this->markdown('mail.notificacionresponsable')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $email;
    }
}
