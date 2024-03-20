<?php

namespace App\Http\Controllers;

use App\Models\Cabecera;
use App\Models\Guia_remicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class Guia_MaquilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $Cabecera = Guia_remicion::whereIn('estado', [1,2,4])->get();

       return view('modulos.Guias_Maquila.index', compact('Cabecera'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ConfirmaOperacion($id)
    {
      $Maquila = Cabecera::find(decrypt($id));
      $Avance = Guia_remicion::where('cabecera_id', decrypt($id))->get();
      return view('modulos.Maquila_confirmacion.confirmaOperacion', compact('Maquila'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GuiaRemicion($id)
    {
        $pdf = Cabecera::find(decrypt($id));

        $pdfs = PDF::loadView('pdf.GuiaRemicion_operacion', compact('pdf'));

        return $pdfs->stream("{$pdf->GuiaMaquilas->n_guia}.pdf");
    }


       /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ReporteMuestreo($id)
    {
        $rm = Cabecera::find(decrypt($id));

        $pdf = PDF::loadView('pdf.ReporteMuestreo', compact('rm'));

        return $pdf->stream("$rm->codigo.pdf");
    }


        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InformeAvance($id)
    {
        $ia = Cabecera::find(decrypt($id));

        $ipdf = PDF::loadView('pdf.InformeAvance', compact('ia'));

        return $ipdf->stream("$ia->codigo.pdf");
    }


  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GuiaoperacionConfirmar($id)
    {
        $Go = Guia_remicion::find(decrypt($id));
        // dd($Go);

        $opdf = PDF::loadView('pdf.GuiaMaquilaOperacion', compact('Go'));

        return $opdf->stream("$Go->codigo.pdf");
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
      $Actualizar = DB::table('guia_remicions')
      ->where('id', $id)
      ->update(['user_id' => auth()->user()->id,
        'observacion' => $request->Observacion,
        'estado' => 5]);

        return redirect()->route('adm.Guias.Maquila.index');
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
