<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionactividades extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionA;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitude)
    {
        $this->notificacionA = $solicitude;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionA->id);
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);

        $emails =  $this->markdown('mail.notificacionActividades')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $emails;
    }
}
