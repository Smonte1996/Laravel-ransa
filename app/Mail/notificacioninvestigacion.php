<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacioninvestigacion extends Mailable
{
    use Queueable, SerializesModels;
    public $notificacionI;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitude)
    {
       $this->notificacionI = $solicitude;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionI->id);
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacioninvestigacion')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $email;
    }
}
