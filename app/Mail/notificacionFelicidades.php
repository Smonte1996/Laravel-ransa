<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class notificacionFelicidades extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionF;
    public $solicitud;
     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notificacionfelicitacion)
    {
        //
        $this->notificacionF = $notificacionfelicitacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->solicitud = solicitude::find($this->notificacionF->solicitude_id);
        //  dd($this->solicitud);
        // $nombreReclamo = strtoupper($this->solicitud->tipo_reclamo->name);
        $email =  $this->markdown('mail.notificacionFelicidades')->subject("Atencion al cliente");

        return $email;
    }
}
