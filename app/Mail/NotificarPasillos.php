<?php

namespace App\Mail;

use App\Models\Info_checklist;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PDF;

class NotificarPasillos extends Mailable
{
    use Queueable, SerializesModels;

    public $ids;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->ids = $id;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = Info_checklist::find($this->ids);
        $id = $pdf->id;
         if ($pdf->almacen == 'Bodega Gye') {

        //   $SupervisoreP[];
         foreach ($pdf->check_seco as $pdfs) {
             $SupervisoreP[] = $pdfs->Pasillos->supervisor->name;
         }
         $supervioresp = array_unique($SupervisoreP);
          array_multisort($supervioresp);

        foreach ($pdf->check_frio as $frios) {
             $superisoreF[] = $frios->Pasillos->supervisor->name;
        }
        $supervioresF = array_unique($superisoreF);
          array_multisort($supervioresF);

        foreach ($pdf->check_reefer as $reefer) {
            $superisoreR[] = $reefer->Pasillos->supervisor->name;
        }
        $supervioresR = array_unique($superisoreR);
          array_multisort($supervioresR);

        foreach ($pdf->Check_Contenedorytuberia as $contenedor) {
            $superisorecon[] = $contenedor->Pasillos->supervisor->name;
        }
         $supervij = array_unique($superisorecon);
          array_multisort($supervij);

          foreach ($pdf->check_Ampliacion as $Ampliacion) {
            $superisoreampli[] = $Ampliacion->Pasillos->supervisor->name;
        }
         $superisoreamp = array_unique($superisoreampli);
          array_multisort($superisoreamp);


          foreach ($pdf->check_andenes as $Andenes) {
            $superisoreAndenes[] = $Andenes->Pasillos->supervisor->name;
        }
        $supervinave = array_unique($superisoreAndenes);
          array_multisort($supervinave);
        // dd($supervinave);
        foreach ($pdf->Check_Bodegayperimetros as $contenedorres) {
            $superisorp[] = $contenedorres->Pasillos->supervisor->name;
        }
         $supervist = array_unique($superisorp);
          array_multisort($supervist);

        /*===============================================================================================
         Aqui agrupo todo los nombre de los supervisores y lo combino en una solo consulta y lo organizo.
        ===============================================================================================*/
        $NombreSupervisores = [$supervist, $supervinave, $superisoreamp, $supervij, $supervioresR, $supervioresF, $supervioresp];
        $nombres = Arr::flatten($NombreSupervisores);
        $Resultado1 = array_unique($nombres);
        array_multisort($Resultado1);

       // Funcion de para calcular todo los valores de bodega seca
        function BodegaSeca($id, $nombre):float{
        $Porcentaje_total = 0;
        $filtro = DB::table('pasillos as p')
        ->join('chcklt_secos as cs', 'p.id', '=' , 'cs.pasillo_id')
        ->join('users as u','p.user_id', '=', 'u.id')
        ->select('cs.id', 'cs.bs1', 'cs.bs2', 'cs.bs3', 'cs.bs4', 'cs.bs5', 'cs.bs6', 'cs.bs7', 'cs.bs8', 'cs.bs9', 'cs.bs10')
        ->where('cs.info_checklist_id', $id)
        ->whereIn('u.name', [$nombre])->get();

        foreach ($filtro as $total) {
         $porcentaje = $total->bs1 + $total->bs2 + $total->bs3 + $total->bs4 + $total->bs5 + $total->bs6 + $total->bs7 + $total->bs8 + $total->bs9 + $total->bs10;
         $Porcentaje_total += ($porcentaje*100/20);
        }
        if (count($filtro)>0) {
        $Porcentaje_total/= count($filtro);
        }
        return $Porcentaje_total;
        }

        foreach ($supervioresp as $superisor ) {
            $bodega_seca[] = BodegaSeca($id, $superisor);
        }
        //   dd($bodega_seca);

      // Funcion de para calcular todo los valores de bodega fria
        function Bodega_fria($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
        ->join('chcklt_frias as cf', 'p.id', '=' , 'cf.pasillo_id')
        ->join('users as u','p.user_id', '=', 'u.id')
        ->select('cf.id', 'cf.bf1', 'cf.bf2', 'cf.bf3', 'cf.bf4', 'cf.bf5', 'cf.bf6', 'cf.bf7', 'cf.bf8', 'cf.bf9', 'cf.bf10')
        ->where('cf.info_checklist_id', $id)
        ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->bf1 + $total->bf2 + $total->bf3 + $total->bf4 + $total->bf5 + $total->bf6 + $total->bf7 + $total->bf8 + $total->bf9 + $total->bf10;
             $Porcentaje_total += ($porcentaje*100/20);
            }
            if (count($filtros)>0) {
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }

            foreach ($supervioresF as $superisore) {
                $bodegafria[] = Bodega_fria($id, $superisore);
            }
            //  dd($bodegafria);
     // Funcion de para calcular todo los valores de bodega reefer
        function Bodegareefer($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
            ->join('chcklt_reefers as cr', 'p.id', '=' , 'cr.pasillo_id')
            ->join('users as u','p.user_id', '=', 'u.id')
            ->select('cr.id', 'cr.br1', 'cr.br2', 'cr.br3', 'cr.br4', 'cr.br5', 'cr.br6')
            ->where('cr.info_checklist_id', $id)
            ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->br1 + $total->br2 + $total->br3 + $total->br4 + $total->br5 + $total->br6;
             $Porcentaje_total += ($porcentaje*100/12);
            }
            if (count($filtros)>0) {
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }

            foreach ($supervioresR as $superisoress ) {
                $bodega_reefer[] = Bodegareefer($id, $superisoress);
            }


     // Funcion de para calcular todo los valores de bodega reefer
        function Bodegaliris($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
            ->join('chcklt_liris as cl', 'p.id', '=' , 'cl.pasillo_id')
            ->join('users as u','p.user_id', '=', 'u.id')
            ->select('cl.id', 'cl.bam1', 'cl.bam2', 'cl.bam3', 'cl.bam4', 'cl.bam5', 'cl.bam6', 'cl.bam7', 'cl.bam8', 'cl.bam9', 'cl.bam10', 'cl.bam11', 'cl.bam12', 'cl.bam13')
            ->where('cl.info_checklist_id', $id)
            ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->bam1 + $total->bam2 + $total->bam3 + $total->bam4 + $total->bam5 + $total->bam6 + $total->bam7 + $total->bam8 + $total->bam9 + $total->bam10 + $total->bam11 + $total->bam12 + $total->bam13;
             $Porcentaje_total += ($porcentaje*100/26);
            }
            if (count($filtros)>0) {
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }
            foreach ($superisoreamp as $superiso ) {
                $bodega_amplicion[] = Bodegaliris($id, $superiso);
            }


      // Funcion de para calcular todo los valores de bodega Andenes
        function BodegaAndenes($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
            ->join('chcklt_andenes as ca', 'p.id', '=' , 'ca.pasillo_id')
            ->join('users as u','p.user_id', '=', 'u.id')
            ->select('ca.id', 'ca.ba1', 'ca.ba2', 'ca.ba3', 'ca.ba4', 'ca.ba5', 'ca.ba6', 'ca.ba7')
            ->where('ca.info_checklist_id', $id)
            ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->ba1 + $total->ba2 + $total->ba3 + $total->ba4 + $total->ba5 + $total->ba6 + $total->ba7;
             $Porcentaje_total += ($porcentaje*100/14);
            }
            if (count($filtros)>0) {
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }
            foreach ($supervinave as $superisna ) {
                $bodega_andenes[] = BodegaAndenes($id, $superisna);
            }


            // Funcion de para calcular todo los valores de bodega contenedor y tuberia
        function BodegaContenedorTuberia($id, $nombre):float{
            $Porcentaje_total = 0;
            $filtros = DB::table('pasillos as p')
            ->join('chcklt_contenedorytuberias as ct', 'p.id', '=' , 'ct.pasillo_id')
            ->join('users as u','p.user_id', '=', 'u.id')
            ->select('ct.id', 'ct.cct', 'ct.cct2', 'ct.cct3')
            ->where('ct.info_checklist_id', $id)
            ->whereIn('u.name', [$nombre])->get();

            foreach ($filtros as $total) {
             $porcentaje = $total->cct + $total->cct2 + $total->cct3;
             $Porcentaje_total += ($porcentaje*100/6);
            }
            if (count($filtros)>0) {
            $Porcentaje_total/= count($filtros);
            }
            return $Porcentaje_total;
            }
            foreach ($supervij as $superisa ) {
                $bodega_Contenedor[] = BodegaContenedorTuberia($id, $superisa);
            }


            function BodegaPerimetro($id, $nombre):float{
                $Porcentaje_total = 0;
                $filtros = DB::table('pasillos as p')
                ->join('chcklt_bodegayperimetros as cp', 'p.id', '=' , 'cp.pasillo_id')
                ->join('users as u','p.user_id', '=', 'u.id')
                ->select('cp.id', 'cp.bp1', 'cp.bp2', 'cp.bp3')
                ->where('cp.info_checklist_id', $id)
                ->whereIn('u.name', [$nombre])->get();

                foreach ($filtros as $total) {
                 $porcentaje = $total->bp1 + $total->bp2 + $total->bp3;
                 $Porcentaje_total += ($porcentaje*100/6);
                }
                if (count($filtros)>0) {
                $Porcentaje_total/= count($filtros);
                }
                return $Porcentaje_total;
                }
                foreach ($supervist as $superisa ) {
                    $bodega_Perimetro[] = BodegaPerimetro($id, $superisa);
                }


         // $Valor_porcentaje = ($bodega_seca + $bodegafria + $bodega_reefer);

         for ($i=0; $i <count($bodega_Perimetro) ; $i++) {
            $total6[]=[$bodega_Perimetro[$i], $supervist[$i]];
        }

          for ($i=0; $i <count($bodega_Contenedor) ; $i++) {
            $total5[]=[$bodega_Contenedor[$i], $supervij[$i]];
        }

         for ($i=0; $i <count($bodega_andenes) ; $i++) {
            $total4[]=[$bodega_andenes[$i], $supervinave[$i]];
            // dd($total4);
         }

          for ($i=0; $i < count($bodega_seca) ; $i++) {
            $total[]=[$bodega_seca[$i], $supervioresp[$i]];
            // $total[]=$bodega_seca[$i];
            // $total1[]=$superisores[$i];
          }

          for ($i=0; $i < count($bodegafria) ; $i++) {
            $total1[]=[$bodegafria[$i], $supervioresF[$i]];
          }

          for ($i=0; $i < count($bodega_reefer) ; $i++) {
            $total2[]=[$bodega_reefer[$i], $supervioresR[$i]];
          }

          for ($i=0; $i < count($bodega_amplicion) ; $i++) {
            $total3[]=[$bodega_amplicion[$i], $superisoreamp[$i]];
          }

        /*==============================================================================================================================
        Aqui agrupo todo los resultados por bodega y lo combino en una solo consulta y le damos valor a los nombre de los supervisores
        y hacemos en las dos variebles lo dividimos para obener el valor promedial de todo los supervisores.
        ==============================================================================================================================*/

        $Totales = [$total, $total1, $total2, $total3, $total4, $total5, $total6];
        $UNOSOLO = Arr::flatten($Totales);
        $Promedial = [];
         for ($i=0; $i <count($Resultado1) ; $i++) {
           $Promedial[] = [$Resultado1[$i], 0,0];
         }
         for ($i=1; $i <count($UNOSOLO) ; $i+=2) {
           for ($j=0; $j <count($Resultado1) ; $j++) {
               if ($Resultado1[$j] == $UNOSOLO[$i]) {
                   $Promedial[$j][1] += $UNOSOLO[$i-1];
                   $Promedial[$j][2]++;
               }
           }
         }
         for ($i=0; $i <count($Promedial) ; $i++) {
          $Promedial[$i] = [$Promedial[$i][0], $Promedial[$i][1] / $Promedial[$i][2]];
        }

        $pdfs = PDF::loadView('pdf.Informe_checklist', compact('pdf', 'total', 'total1', 'total2', 'total3', 'total4','total5', 'total6', 'Promedial'));

    } else {
       //   $SupervisoreP[];
       foreach ($pdf->check_seco as $pdfs) {
        $SupervisoreP[] = $pdfs->Pasillos->supervisor->name;
    }
    $supervioresp = array_unique($SupervisoreP);
     array_multisort($supervioresp);

     foreach ($pdf->check_andenes as $Andenes) {
       $superisoreAndenes[] = $Andenes->Pasillos->supervisor->name;
   }
   $supervinave = array_unique($superisoreAndenes);
     array_multisort($supervinave);
   // dd($supervinave);

   foreach ($pdf->Check_Bodegayperimetros as $contenedorres) {
       $superisorp[] = $contenedorres->Pasillos->supervisor->name;
   }
    $supervist = array_unique($superisorp);
     array_multisort($supervist);

      /*===============================================================================================
        Aqui agrupo todo los nombre de los supervisores y lo combino en una solo consulta y lo organizo.
        ===============================================================================================*/
        $NombreSupervisores = [$supervist, $supervinave, $supervioresp];
        $nombres = Arr::flatten($NombreSupervisores);
        $Resultado1 = array_unique($nombres);
        array_multisort($Resultado1);

  // Funcion de para calcular todo los valores de bodega seca
   function BodegaSeca($id, $nombre):float{
   $Porcentaje_total = 0;
   $filtro = DB::table('pasillos as p')
   ->join('chcklt_secos as cs', 'p.id', '=' , 'cs.pasillo_id')
   ->join('users as u','p.user_id', '=', 'u.id')
   ->select('cs.id', 'cs.bs1', 'cs.bs2', 'cs.bs3', 'cs.bs4', 'cs.bs5', 'cs.bs6', 'cs.bs7', 'cs.bs8', 'cs.bs9', 'cs.bs10')
   ->where('cs.info_checklist_id', $id)
   ->whereIn('u.name', [$nombre])->get();

   foreach ($filtro as $total) {
    $porcentaje = $total->bs1 + $total->bs2 + $total->bs3 + $total->bs4 + $total->bs5 + $total->bs6 + $total->bs7 + $total->bs8 + $total->bs9 + $total->bs10;
    $Porcentaje_total += ($porcentaje*100/20);
   }
   if (count($filtro)>0) {
   $Porcentaje_total/= count($filtro);
   }
   return $Porcentaje_total;
   }

   foreach ($supervioresp as $superisor ) {
       $bodega_seca[] = BodegaSeca($id, $superisor);
   }
   //   dd($bodega_seca);

 // Funcion de para calcular todo los valores de bodega Andenes
   function BodegaAndenes($id, $nombre):float{
       $Porcentaje_total = 0;
       $filtros = DB::table('pasillos as p')
       ->join('chcklt_andenes as ca', 'p.id', '=' , 'ca.pasillo_id')
       ->join('users as u','p.user_id', '=', 'u.id')
       ->select('ca.id', 'ca.ba1', 'ca.ba2', 'ca.ba3', 'ca.ba4', 'ca.ba5', 'ca.ba6', 'ca.ba7')
       ->where('ca.info_checklist_id', $id)
       ->whereIn('u.name', [$nombre])->get();

       foreach ($filtros as $total) {
        $porcentaje = $total->ba1 + $total->ba2 + $total->ba3 + $total->ba4 + $total->ba5 + $total->ba6 + $total->ba7;
        $Porcentaje_total += ($porcentaje*100/14);
       }
       if (count($filtros)>0) {
       $Porcentaje_total/= count($filtros);
       }
       return $Porcentaje_total;
       }
       foreach ($supervinave as $superisna ) {
           $bodega_andenes[] = BodegaAndenes($id, $superisna);
       }


       function BodegaPerimetro($id, $nombre):float{
           $Porcentaje_total = 0;
           $filtros = DB::table('pasillos as p')
           ->join('chcklt_bodegayperimetros as cp', 'p.id', '=' , 'cp.pasillo_id')
           ->join('users as u','p.user_id', '=', 'u.id')
           ->select('cp.id', 'cp.bp1', 'cp.bp2', 'cp.bp3')
           ->where('cp.info_checklist_id', $id)
           ->whereIn('u.name', [$nombre])->get();

           foreach ($filtros as $total) {
            $porcentaje = $total->bp1 + $total->bp2 + $total->bp3;
            $Porcentaje_total += ($porcentaje*100/6);
           }
           if (count($filtros)>0) {
           $Porcentaje_total/= count($filtros);
           }
           return $Porcentaje_total;
           }
           foreach ($supervist as $superisa ) {
               $bodega_Perimetro[] = BodegaPerimetro($id, $superisa);
           }

    // $Valor_porcentaje = ($bodega_seca + $bodegafria + $bodega_reefer);

    for ($i=0; $i <count($bodega_Perimetro) ; $i++) {
       $total6[]=[$bodega_Perimetro[$i], $supervist[$i]];
   }

    for ($i=0; $i <count($bodega_andenes) ; $i++) {
       $total4[]=[$bodega_andenes[$i], $supervinave[$i]];
       // dd($total4);
    }

     for ($i=0; $i < count($bodega_seca) ; $i++) {
       $total[]=[$bodega_seca[$i], $supervioresp[$i]];
     }

     /*==============================================================================================================================
        Aqui agrupo todo los resultados por bodega y lo combino en una solo consulta y le damos valor a los nombre de los supervisores
        y hacemos en las dos variebles lo dividimos para obener el valor promedial de todo los supervisores.
        ==============================================================================================================================*/

        $Totales = [$total, $total4, $total6];
        $UNOSOLO = Arr::flatten($Totales);
        $Promedial = [];
         for ($i=0; $i <count($Resultado1) ; $i++) {
           $Promedial[] = [$Resultado1[$i], 0,0];
         }
         for ($i=1; $i <count($UNOSOLO) ; $i+=2) {
           for ($j=0; $j <count($Resultado1) ; $j++) {
               if ($Resultado1[$j] == $UNOSOLO[$i]) {
                   $Promedial[$j][1] += $UNOSOLO[$i-1];
                   $Promedial[$j][2]++;
               }
           }
         }
         for ($i=0; $i <count($Promedial) ; $i++) {
          $Promedial[$i] = [$Promedial[$i][0], $Promedial[$i][1] / $Promedial[$i][2]];
        }


   $pdfs = PDF::loadView('pdf.Informe_checklist', compact('pdf', 'total', 'total4', 'total6', 'Promedial'));

     }

        $email = $this->markdown('mail.notificarPasillos')->subject('Checklist de Pasillo');

        $email->attachData($pdfs->output(),strtoupper("Checklist Pasillo.pdf"));

        return $email;
    }
}
