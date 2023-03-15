<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionNoProcede extends Mailable
{
    use Queueable, SerializesModels;

     public $notificacionNP;
     public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificacioninvestigacionnoprocede)
    {
        //
        $this->notificacionNP = $notificacioninvestigacionnoprocede;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionNP)->last();
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacionresnoProcede')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");
    }
}
