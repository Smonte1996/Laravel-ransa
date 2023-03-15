<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionCorreccion extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionC;
    public $solicitud;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificacioncorreccion)
    {
        //
        $this->notificacionC = $notificacioncorreccion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionC)->last();
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacioncorreccion')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $email;
    }
}
