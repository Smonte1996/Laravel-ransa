<?php

namespace App\Mail;

use App\Models\solicitude;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notificacionregistro extends Mailable
{
    use Queueable, SerializesModels;

    public $notificacionR;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(solicitude $solicitude)
    {
        //
        $this->notificacionR = $solicitude;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email =  $this->markdown('mail.notificacionregistro')->subject('NOTIFICACIÓN DE UNA ' .$this->notificacionR->tipo_reclamo->name);

        return $email;
    }
}
