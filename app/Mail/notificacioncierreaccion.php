<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacioncierreaccion extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionRc;
    public $solicitud;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($solicitude)
    {
        //
        $this->notificacionRc = $solicitude;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

         $this->solicitud = solicitude::find($this->notificacionRc->id);
         $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
         $email =  $this->markdown('mail.notificacioncierre')->subject("NOTIFICACIÓN DE UN {$nombreReclamo}");

         return $email;
    }
}
