<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionReaperturaResponsable extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionRR;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitude)
    {
        //
        $this->notificacionRR = $solicitude;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionRR->id);
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacionreaperturaresponsable')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $email;
    }
}
