<?php

namespace App\Http\Controllers;

use App\Models\Infor_practicahg;
use App\Models\Practica_proveedore;
use App\Models\Practicahg;
use Illuminate\Http\Request;
use PDF;

class PracticahgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Higienes = Infor_practicahg::all()->where('estado', 2);
        return view('modulos.Practicas_hg.index', compact('Higienes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Generarpdfs($id)
    {
        // se hace la consulta a la la tabla base para seguir con el id del registro con la relaciones enloque.
        $pdfi = Infor_practicahg::find($id);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdfm = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 9)->get();
        foreach ($pdfm as $pdfa) {
             $supervisor2 = $pdfa->Supervisores->name;
        }
        // dd($pdfm->Personal->name);
        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdfl = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 11)->get();
        foreach ($pdfl as $pdfa) {
             $supervisor3 = $pdfa->Supervisores->name;
        }
        // dd($pdfl);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdfj = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 14)->get();
        foreach ($pdfj as $pdfa) {
             $supervisor4 = $pdfa->Supervisores->name;
        }
        //dd($pdfj);
        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdff = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 13)->get();
        foreach ($pdff as $pdfsam) {
             $supervisor5 = $pdfsam->Supervisores->name;
        }
        // dd($pdfa);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdfe = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 15)->get();
        foreach ($pdfe as $pdfa) {
             $supervisor6 = $pdfa->Supervisores->name;
        }
        // dd($pdfe);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdfg = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 16)->get();
        foreach ($pdfg as $pdfa) {
             $supervisor7 = $pdfa->Supervisores->name;
        }
        // dd($pdfg);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdf = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 10)->get();
        foreach ($pdf as $pdfa) {
             $supervisor = $pdfa->Supervisores->name;
        }
        // dd($pdf);

        // se esat haciendo a la consulta para filtrar con el id del supervisor y a la ves se consulta el nombre del supervisor.
        $pdf2 = Practicahg::where('infor_practicahg_id', $id)->Where('user_id', 12)->get();
        foreach ($pdf2 as $pdfa) {
             $supervisor1 = $pdfa->Supervisores->name;
        }

        function Total_supervisores($id)
        {
          $Porcentajes = [0,0,0,0,0,0,0,0];
          $Porcentajes2 = [0,0,0,0,0,0,0,0];
          $Puntacion = Practicahg::where('infor_practicahg_id', $id)->WhereIn('user_id', [9, 10, 11, 12, 13, 14, 15, 16])->get();

          foreach ($Puntacion as $total) {
            $totales = $total->uc + $total->bl + $total->cl + $total->cp + $total->na + $total->ul;
            // $Porcentajes += ($totales*100/12);
            if ($total->user_id == 9) {
               $Porcentajes2[0] += 1;
                $Porcentajes[0] += ($totales*100/12);
            }if ($total->user_id == 10) {
                $Porcentajes2[1] += 1;
                $Porcentajes[1] += ($totales*100/12);
            }if ($total->user_id == 11) {
                $Porcentajes2[2] += 1;
                $Porcentajes[2] += ($totales*100/12);
            }if ($total->user_id == 12) {
                $Porcentajes2[3] += 1;
                $Porcentajes[3] += ($totales*100/12);
            }if ($total->user_id == 13) {
                $Porcentajes2[4] += 1;
                $Porcentajes[4] += ($totales*100/12);
            }if ($total->user_id == 14) {
                $Porcentajes2[5] += 1;
                $Porcentajes[5] += ($totales*100/12);
            }if ($total->user_id == 15) {
                $Porcentajes2[6] += 1;
                $Porcentajes[6] += ($totales*100/12);
            }if ($total->user_id == 16) {
                $Porcentajes2[7] += 1;
                $Porcentajes[7] += ($totales*100/12);
            }
          }

          for ($i=0; $i <8 ; $i++) {
            if ($Porcentajes2[$i]>0) {
             $Porcentajes[$i]/= $Porcentajes2[$i];
            }
          }

          return $Porcentajes;
        }

         $Todos = Total_supervisores($id);
         $Supervisores = [$supervisor2, $supervisor, $supervisor3, $supervisor1, $supervisor5, $supervisor4, $supervisor6, $supervisor7];

          for ($i=0; $i < count($Todos) ; $i++) {
            $final[] = [$Todos[$i], $Supervisores[$i]];
          }
        //  dd($final);

        $pdfs = PDF::loadView('pdf.Practicashg', compact('pdf', 'pdf2','pdfm', 'pdfl', 'pdfj','pdff', 'pdfe','pdfg', 'supervisor', 'supervisor7', 'supervisor5', 'supervisor6', 'supervisor4', 'supervisor3', 'supervisor2', 'supervisor1' ,'pdfi', 'final'));

        return $pdfs->setPaper('a4','landscape')->stream(strtoupper("Practicas Higiene $pdfi->fecha.pdf"));
    }



/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function PdfProveedor($id)
    {
      // se hace la consulta a la la tabla base para seguir con el id del registro con la relaciones enloque.
      $PDFPROVEEDOR = Infor_practicahg::find($id);

      $PDFRESPONSABLE = Practica_proveedore::where('infor_practicahg_id', $id)->where('user_id', 17)->get();
      foreach ($PDFRESPONSABLE as $PDFRESPONSABLES) {
       $nombre  = $PDFRESPONSABLES->Responsable->name;
      }

      $PDFRESPONSABLE_ESTIBAS = Practica_proveedore::where('infor_practicahg_id', $id)->where('user_id', 18)->get();
       foreach ($PDFRESPONSABLE_ESTIBAS as $PDFRESPONSABLE_ESTIBA) {
        $nombres = $PDFRESPONSABLE_ESTIBA->Responsable->name;
       }

       function EvaluacionSupervisores($id)
       {
        $PORCENTAJE = [0,0];
        $PORCENTAJE1 = [0,0];
        $punto = Practica_proveedore::where('infor_practicahg_id', $id)->whereIn('user_id', [17,18])->get();

        foreach ($punto as $Puntos) {
            $total = $Puntos->puc + $Puntos->pbl + $Puntos->pcl + $Puntos->pcp + $Puntos->pna + $Puntos->pul;

            if ($Puntos->user_id == 17) {
                $PORCENTAJE1[0] += 1;
                 $PORCENTAJE[0] += ($total*100/12);
             }if ($Puntos->user_id == 18) {
                 $PORCENTAJE1[1] += 1;
                  $PORCENTAJE[1] += ($total*100/12);
             }
        }
        for ($i=0; $i <2 ; $i++) {
            if ($PORCENTAJE1[$i]>0) {
             $PORCENTAJE[$i]/= $PORCENTAJE1[$i];
            }
          }

          return $PORCENTAJE;
       }
       $Procentaje_Total = EvaluacionSupervisores($id);
       $nombre_Supervisores = [$nombre, $nombres];

       for ($i=0; $i <count($Procentaje_Total) ; $i++) {
        $ValoresJunto[] = [$Procentaje_Total[$i], $nombre_Supervisores[$i]];
       }
        // dd($ValoresJunto);

      $pdfs = PDF::loadView('pdf.PracticasProveedor', compact('PDFPROVEEDOR', 'PDFRESPONSABLE', 'PDFRESPONSABLE_ESTIBAS', 'nombre', 'nombres', 'ValoresJunto'));

      return $pdfs->setPaper('a4','landscape')->stream(strtoupper("Practicas Higiene $PDFPROVEEDOR->fecha.pdf"));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
