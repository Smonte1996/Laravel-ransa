<?php

namespace App\Mail;

use App\Models\Infor_practicahg;
use App\Models\Practicahg;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class notificarRansa extends Mailable
{
    use Queueable, SerializesModels;

    public $PersonalRansa;
    public $nombre;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($Infor_pg)
    {
        //
        $this->PersonalRansa = $Infor_pg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdfi = Infor_practicahg::find($this->PersonalRansa->id);

         $id = $pdfi->id;
        // if ($pdfi->almacen == "Bodega Gye") {
            // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdfm = Practicahg::where('infor_practicahg_id', $id)->get();
        foreach ($pdfm as $pdfa) {
             $supervisor = $pdfa->Supervisor->name;
             $this->nombre = $pdfa->Supervisor->name;
        }
        // dd($pdfm->Personal->name);
        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfl = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 11)->get();
        // foreach ($pdfl as $pdfa) {
        //      $supervisor3 = $pdfa->Supervisor->name;
        // }
        // dd($pdfl);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfj = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 14)->get();
        // foreach ($pdfj as $pdfa) {
        //      $supervisor4 = $pdfa->Supervisor->name;
        // }
        //dd($pdfj);
        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdff = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 13)->get();
        // foreach ($pdff as $pdfsam) {
        //      $supervisor5 = $pdfsam->Supervisor->name;
        // }
        // dd($pdfa);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfe = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 15)->get();
        // foreach ($pdfe as $pdfa) {
        //      $supervisor6 = $pdfa->Supervisor->name;
        // }
        // dd($pdfe);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfg = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 16)->get();
        // foreach ($pdfg as $pdfa) {
        //      $supervisor7 = $pdfa->Supervisor->name;
        // }
        // dd($pdfg);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdf = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 10)->get();
        // foreach ($pdf as $pdfa) {
        //      $supervisor = $pdfa->Supervisor->name;
        // }
        // dd($pdf);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdf2 = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 12)->get();
        // foreach ($pdf2 as $pdfa) {
        //      $supervisor1 = $pdfa->Supervisor->name;
        // }

        // function Total_supervisores($id)
        // {
        //   $Porcentajes = [0,0,0,0,0,0,0,0];
        //   $Porcentajes2 = [0,0,0,0,0,0,0,0];
        //   $Puntacion = Practicahg::where('infor_practicahg_id', $id)->WhereIn('user_id', [9, 10, 11, 12, 13, 14, 15, 16])->get();

        //   foreach ($Puntacion as $total) {
        //     $totales = $total->uc + $total->bl + $total->cl + $total->cp + $total->na + $total->ul;
        //     // $Porcentajes += ($totales*100/12);
        //     if ($total->user_id == 9) {
        //        $Porcentajes2[0] += 1;
        //         $Porcentajes[0] += ($totales*100/12);
        //     }if ($total->user_id == 10) {
        //         $Porcentajes2[1] += 1;
        //         $Porcentajes[1] += ($totales*100/12);
        //     }if ($total->user_id == 11) {
        //         $Porcentajes2[2] += 1;
        //         $Porcentajes[2] += ($totales*100/12);
        //     }if ($total->user_id == 12) {
        //         $Porcentajes2[3] += 1;
        //         $Porcentajes[3] += ($totales*100/12);
        //     }if ($total->user_id == 13) {
        //         $Porcentajes2[4] += 1;
        //         $Porcentajes[4] += ($totales*100/12);
        //     }if ($total->user_id == 14) {
        //         $Porcentajes2[5] += 1;
        //         $Porcentajes[5] += ($totales*100/12);
        //     }if ($total->user_id == 15) {
        //         $Porcentajes2[6] += 1;
        //         $Porcentajes[6] += ($totales*100/12);
        //     }if ($total->user_id == 16) {
        //         $Porcentajes2[7] += 1;
        //         $Porcentajes[7] += ($totales*100/12);
        //     }
        //   }

        //   for ($i=0; $i <8 ; $i++) {
        //     if ($Porcentajes2[$i]>0) {
        //      $Porcentajes[$i]/= $Porcentajes2[$i];
        //     }
        //   }

        //   return $Porcentajes;
        // }

        //  $Todos = Total_supervisores($id);
        function Total_supervisores($id)
        {
          $Porcentajes = 0;
          $Puntacion = Practicahg::where('infor_practicahg_id', $id)->get();

          foreach ($Puntacion as $total) {
            $totales = $total->uc + $total->bl + $total->cl + $total->cp + $total->na + $total->ul;
            // $Porcentajes += ($totales*100/12);

                $Porcentajes += ($totales*100/12);
          }

          if (count($Puntacion)>0) {
            $Porcentajes/= count($Puntacion);
            }

          return $Porcentajes;
        }

         $Todos = Total_supervisores($id);

        //  $Supervisores = [$supervisor2, $supervisor, $supervisor3, $supervisor1, $supervisor5, $supervisor4, $supervisor6, $supervisor7];

        //   for ($i=0; $i < count($Todos) ; $i++) {
        //     $final[] = [$Todos[$i], $Supervisores[$i]];
        //   }
        //  dd($final);

        $pdfs = PDF::loadView('pdf.Practicashg', compact('pdfi','pdfm','supervisor', 'Todos'));

        $email = $this->markdown('mail.notificarRansa')->subject('Practicas Higiene Ransa');//.strtoupper($this->PracticasProveedor->solicitud));
        $email->attachData($pdfs->setPaper('a4','landscape')->output(), "Practicas Higiene {$pdfi->fecha}.pdf");
        return $email;

        // } else {

              // esta parte del codigo pasa los datos para Quito.
             // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfm = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 18)->get();
        // foreach ($pdfm as $pdfa) {
        //      $supervisor2Uio = $pdfa->Supervisores->name;
        // }
        //  dd($supervisor2Uio);
        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfl = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 19)->get();
        // foreach ($pdfl as $pdfa) {
        //      $supervisor3 = $pdfa->Supervisores->name;
        // }
        // dd($pdfl);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfj = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 20)->get();
        // foreach ($pdfj as $pdfa) {
        //      $supervisor4 = $pdfa->Supervisor->name;
        // }
        //dd($pdfj);
        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdff = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 21)->get();
        // foreach ($pdff as $pdfsam) {
        //      $supervisor5 = $pdfsam->Supervisor->name;
        // }
        // dd($pdfa);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        // $pdfe = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 22)->get();
        // foreach ($pdfe as $pdfa) {
        //      $supervisor6 = $pdfa->Supervisor->name;
        // }
        // dd($pdfe);


        // function Total_supervisores($id)
        // {
        //   $Porcentajes = [0,0,0,0];
        //   $Porcentajes2 = [0,0,0,0];
        //   $Puntacion = Practicahg::where('infor_practicahg_id', $id)->WhereIn('user_id', [19, 20, 21, 22])->get();

        //   foreach ($Puntacion as $total) {
        //     $totales = $total->uc + $total->bl + $total->cl + $total->cp + $total->na + $total->ul;
        //     // $Porcentajes += ($totales*100/12);
        //     if ($total->user_id == 19) {
        //         $Porcentajes2[0] += 1;
        //         $Porcentajes[0] += ($totales*100/12);
        //     }if ($total->user_id == 20) {
        //         $Porcentajes2[1] += 1;
        //         $Porcentajes[1] += ($totales*100/12);
        //     }if ($total->user_id == 21) {
        //         $Porcentajes2[2] += 1;
        //         $Porcentajes[2] += ($totales*100/12);
        //     }if ($total->user_id == 22) {
        //         $Porcentajes2[3] += 1;
        //         $Porcentajes[3] += ($totales*100/12);
        //     }
        //   }

        //   for ($i=0; $i <4 ; $i++) {
        //     if ($Porcentajes2[$i]>0) {
        //      $Porcentajes[$i]/= $Porcentajes2[$i];
        //     }
        //   }

        //   return $Porcentajes;
        // }

        //  $Todos = Total_supervisores($id);
        //  $Supervisores = [$supervisor3, $supervisor5, $supervisor4, $supervisor6];

        //   for ($i=0; $i < count($Todos) ; $i++) {
        //     $final[] = [$Todos[$i], $Supervisores[$i]];
        //   }
        // //  dd($final);

        // $pdfs = PDF::loadView('pdf.Practicashg', compact('pdfl', 'pdfj','pdff', 'pdfe', 'supervisor5', 'supervisor6', 'supervisor4', 'supervisor3','pdfi', 'final'));

        // $email = $this->markdown('mail.notificarRansa')->subject('Practicas Higiene Ransa');//.strtoupper($this->PracticasProveedor->solicitud));
        // $email->attachData($pdfs->setPaper('a4','landscape')->output(), "Practicas Higiene {$pdfi->fecha}.pdf");
        // return $email;
        // }

    }
}
