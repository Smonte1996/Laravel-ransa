<?php

namespace App\Mail;

use App\Models\Cabecera;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class NotificacionInformeClienteMaquila extends Mailable
{
    use Queueable, SerializesModels;

    public $Informe;
    public $ie;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->Informe = $id;
        $this->ie = Cabecera::find($this->Informe);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){

        $ia = Cabecera::find($this->Informe);

        $ipdf = PDF::loadView('pdf.InformeAvance', compact('ia'));

        $email = $this->markdown('mail.notificacioninformeclientemaquila')->subject('Informe de Avance de la orden '.$this->ie->codigo.'- Guia # '.$this->ie->Guias->n_guia);

        $email->attachData($ipdf->output(),strtoupper("Informe de Avances.pdf"));

        return $email;

    }
}
