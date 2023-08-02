<?php

namespace App\Mail;

use App\Models\Clasificacion;
use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use phpDocumentor\Reflection\Types\This;

class notificacionclasificacion extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionC;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificacionclasificacion)
    {
        //
        // $this->notificacionC = $clasificacion;
        $this->notificacionC = $notificacionclasificacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionC->solicitude_id);
        $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacionclasificacion')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

        return $email;
    }
}
